<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


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
        $userLists = User::orderBy('name', 'ASC')->paginate(15);
        return view('admin.account',compact('userLists'));
    }
    function showDetailReportPage($id){
        return view('admin.detail_report');
    }

    function showRegisterAccount(){
        $user = new User();
        return view('admin.register_account');
    }

    function postRegisterAccount(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->chuc_vu = "";
        $user->hoc_vi = "";
        $user->sdt ="";
        $user->password = Hash::make($request->password);
        $user->save();

        $testMailData = [
            'title' => 'Test Email From AllPHPTricks.com',
            'body' => 'This is the body of test email.'
        ];

        Mail::to('qh.mt14@gmail.com')->send(new SendMail($testMailData));
        // Mail::to($data['email'])->send(new WelcomeMail(compact('user')));
        return redirect('admin/account');
    }
}