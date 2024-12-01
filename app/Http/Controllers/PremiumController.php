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
            'duration' => 'required|in:1,3,6,12',
        ]);

        $applier = Applier::where('user_id', Auth::user()->id)->first();
        if($applier->end_date_premium > now()){
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            // $applier->update([
            //     'start_date_premium' => now(),
            //     'end_date_premium' => now()->addMonths($req->duration),
            // ]);
            $duration = intval($req->duration);

            $price = 0;
            $price = match($duration) {
                1 => 10000,
                3 => 28000,
                6 => 50000,
                12 => 90000,
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

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');

            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);

            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED', true);

            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = ENV('MIDTRANS_IS_3DS', true);

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $transaction->price,
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->phone_number,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $transaction->update(['snap_token' => $snapToken]);
            DB::commit();
            return view('user.checkout', compact('transaction'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Please try again later.']);
        }
    }
}
