<?php

namespace App\Http\Controllers;

use App\Models\UserHistory;
use Illuminate\Http\Request;
use App\Models\Applier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PremiumController extends Controller
{
    public function process(Request $req){
        $req->validate([
            'duration' => 'required|in:3,6,12',
        ]);

        $applier = Applier::where('user_id', Auth::id())->first();
        if($applier->end_date_premium > now()){
            session()->flash('error', 'You are already a premium member.');
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            $duration = intval($req->duration);

            $price = 0;
            $price = match($duration) {
                3 => 1499000,
                6 => 2399000,
                12 => 3799000,
            };

            $transaction = UserHistory::create([
                'name' => 'Premium Membership',
                'applier_id'=> $applier->id,
                'duration' => $duration,
                'price' => $price,
                'start_date' => now(),
                'end_date' => now()->addMonths($duration),
                'status' => 'pending',
            ]);

            // Set Merchant Server Key
            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');

            // Set to Development/Sandbox Environment
            \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);

            // Set sanitization on
            \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED', true);

            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = ENV('MIDTRANS_IS_3DS', true);

            $user = Auth::user();
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $transaction->price,
                ),
                'customer_details' => array(
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone_number,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $transaction->update(['snap_token' => $snapToken]);
            DB::commit();
            return redirect()->route('user.checkout', ['transaction' => $transaction->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Please try again later.']);
        }
    }

    public function checkout(UserHistory $transaction){
        $applier = Auth::user()->applier;
        return view('user.checkout', compact('transaction', 'applier'));
    }

    public function success(Request $req){
        Applier::where('user_id', Auth::id())->update([
            'start_date_premium' => now(),
            'end_date_premium' => now()->addMonths($req->json('duration')),
        ]);

        UserHistory::where('snap_token', $req->json('snap_token'))->update([
            'status' => 'success',
        ]);

        session()->put('message', 'Payment Success');
        return redirect()->route('user.home');
    }

    public function viewPremium(){
        return view('user.premiumUser');
    }

    public function viewPremiumBundle(){
        return view('user.premiumBundle');
    }
}
