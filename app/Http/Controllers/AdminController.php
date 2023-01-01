<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;

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
                    ->orderBy('nhat_ky.created_at', 'DESC')
                    ->select('name','ten_phong','ma_lop','ma_thiet_bi','ten_thiet_bi','ten_lop',
                    'buoi','ngay','mo_ta_loi', 'nhat_ky.id')
                    ->paginate(20);
                    // dd($reportList);die;
        // $reportList = $reports->sortBy('created_at');
        return view('admin.report', compact('reportList'));
    }

    function showDevicePage(){
        return view('admin.device');
    }

    function showChartPage(){
        return view('admin.chart');
    }
    
    function showAccountPage(){
        $userLists = User::paginate(15);
        return view('admin.account',compact('userLists'));
    }
    function showDetailReportPage($id){
        return view('admin.detail_report');
    }

    function showRegisterAccount(){
        return view('admin.register_account');
    }
}