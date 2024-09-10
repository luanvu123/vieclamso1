<?php

namespace App\Http\Controllers;

use App\Models\OnlineVisitor;
use App\Models\OnlineVisitorRecruitment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          // Đếm tổng số IP đã truy cập vào route '/'
        $totalHomeVisitors = OnlineVisitor::count();

        // Đếm tổng số IP đã truy cập vào route '/recruitment'
        $totalRecruitmentVisitors = OnlineVisitorRecruitment::count();

        // Đếm số lượng người đang online trên route '/'
        $onlineHomeVisitors = OnlineVisitor::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();

        // Đếm số lượng người đang online trên route '/recruitment'
        $onlineRecruitmentVisitors = OnlineVisitorRecruitment::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();
        return view('home', compact('totalHomeVisitors', 'totalRecruitmentVisitors', 'onlineHomeVisitors', 'onlineRecruitmentVisitors'));
    }
}
