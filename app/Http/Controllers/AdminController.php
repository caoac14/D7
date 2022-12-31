<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    function showHomePage(){
        return view('admin.home');
    }

    function showReportPage(){
        $reportList = Report::join('phong', 'phong.id', '=', 'nhat_ky.ma_phong')
                    ->join('lop', 'lop.id', '=', 'nhat_ky.ma_lop')
                    ->join('users', 'users.id', '=', 'nhat_ky.ma_giao_vien')
                    ->join('thiet_bi', 'thiet_bi.id', '=', 'nhat_ky.ma_thiet_bi')
                    ->get();
        return view('admin.report', compact('reportList'));
    }

    function showDevicePage(){
        return view('admin.device');
    }

    function showChartPage(){
        return view('admin.chart');
    }
    
    function showAccountPage(){
        return view('admin.account');
    }
}
