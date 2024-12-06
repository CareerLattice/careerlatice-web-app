<?php

namespace App\Http\Controllers;

use App\Models\Applier;
use App\Models\Company;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function viewHome(Request $request){
        $totalApplier = Applier::all()->count();
        $totalCompany = Company::all()->count();
        $totalRevenue = UserHistory::all()->sum('price');

        $monthRevenue = DB::table('user_histories')
            ->whereMonth('created_at', '=', now()->month)
            ->whereYear('created_at', '=', now()->year)
            ->sum('price');

        $listPremium = DB::table('user_histories')
            ->join('appliers', 'user_histories.applier_id', '=', 'appliers.id')
            ->join('users', 'appliers.user_id', '=', 'users.id')
            ->select('users.name', 'user_histories.price', 'appliers.id as applier_id',
            DB::raw("DATE_FORMAT(user_histories.start_date, '%d %M %Y') as start_date"),
            DB::raw("DATE_FORMAT(user_histories.end_date, '%d %M %Y') as end_date"))
            ->where('user_histories.status', 'success')
            ->orderBy('user_histories.created_at', 'desc');

        $sort = $request->get('sort');
        $order = $request->get('order');
        if($sort != null){
            $listPremium = $order == 'desc' ? $listPremium->orderByDesc($sort) : $listPremium->orderBy($sort);
        }

        $listPremium = $listPremium->paginate(5);
        return view('admin.home', compact('totalApplier', 'totalCompany', 'totalRevenue', 'monthRevenue', 'listPremium', 'order', 'sort'));
    }
}
