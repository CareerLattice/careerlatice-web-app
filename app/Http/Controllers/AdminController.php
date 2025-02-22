<?php

namespace App\Http\Controllers;

use App\Models\Applier;
use App\Models\Company;
use App\Models\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function viewHome(Request $request){
        $totalApplier = Applier::all()->count();
        $totalCompany = Company::all()->count();
        $totalRevenue = UserHistory::all()->sum('price');

        $monthRevenue = DB::table('user_histories')
            ->where('status', 'success')
            ->whereMonth('start_date', '=', now()->month)
            ->whereYear('start_date', '=', now()->year)
            ->sum('price');

        $listPremium = DB::table('user_histories')
            ->join('appliers', 'user_histories.applier_id', '=', 'appliers.id')
            ->join('users', 'appliers.user_id', '=', 'users.id')
            ->select('users.name', 'user_histories.price', 'appliers.id as applier_id',
            DB::raw("DATE_FORMAT(user_histories.start_date, '%d %M %Y') as start_date"),
            DB::raw("DATE_FORMAT(user_histories.end_date, '%d %M %Y') as end_date"))
            ->where('user_histories.status', 'success');

        $startPremium = $request->get('start_premium');
        $endPremium = $request->get('end_premium');

        if($startPremium != null && $endPremium != null){
            $endPremium = Carbon::parse($endPremium)->setTime(23, 59, 59);
            $listPremium = $listPremium->where('user_histories.start_date', '>=', $startPremium)
                ->where('user_histories.start_date', '<=', $endPremium);

        } else if($startPremium == null && $endPremium != null){
            session()->flash('error', 'Please fill the start premium date');
        } else if($endPremium == null && $startPremium != null){
            session()->flash('error', 'Please fill the end premium date');
        }

        $sort = $request->get('sort');
        $order = $request->get('order');
        if($sort != null){
            $listPremium = $order === 'desc' ? $listPremium->orderByDesc($sort) : $listPremium->orderBy($sort);
        }

        $listPremium = $listPremium->paginate(5)->withQueryString();
        return view('admin.home', compact('totalApplier', 'totalCompany', 'totalRevenue', 'monthRevenue', 'listPremium', 'order', 'sort'));
    }

    public function RangeRevenue(Request $request){
        $startDate = $request->query('dateFrom');
        $endDate = $request->query('dateTo');
        $endDate = Carbon::parse($endDate)->setTime(23, 59, 59);

        $rangeRevenue = DB::table('user_histories')
            ->where('status', 'success')
            ->where('start_date', '>=', $startDate)
            ->where('start_date', '<=', $endDate)
            ->sum('price');

        return response()->json(['rangeRevenue' => $rangeRevenue]);
    }
}
