<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\Device;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;
use App\Mail\ResetMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    function showHomePage()
    {
        return view('admin.home');
    }

    function showReportPage()
    {
        $reportList = Report::join('phong', 'phong.id', '=', 'nhat_ky.ma_phong')
            ->join('lop', 'lop.id', '=', 'nhat_ky.ma_lop')
            ->join('users', 'users.id', '=', 'nhat_ky.ma_giao_vien')
            ->join('thiet_bi', 'thiet_bi.id', '=', 'nhat_ky.ma_thiet_bi')
            ->orderBy('nhat_ky.created_at', 'DESC')
            ->select(
                'name',
                'ten_phong',
                'ma_lop',
                'ma_thiet_bi',
                'ten_thiet_bi',
                'ten_lop',
                'buoi',
                'ngay',
                'mo_ta_loi',
                'nhat_ky.id'
            )
            ->paginate(20);
        // dd($reportList);die;
        // $reportList = $reports->sortBy('created_at');
        return view('admin.report', compact('reportList'));
    }




    // function of Device
    function showDevicePage()
    {
        $deviceLists = Device::orderBy('ten_thiet_bi', 'ASC')->get();
        $roomLists = Room::orderBy('ten_phong', 'ASC')->get();
        return view('admin.device', compact('deviceLists', 'roomLists'));
    }





    // function of Chart
    function showChartPage()
    {
        return view('admin.chart');
    }





    // function of Account
    function showAccountPage()
    {
        $userLists = User::orderBy('name', 'ASC')->paginate(20);
        return view('admin.account', compact('userLists'));
    }

    function showDetailAccountPage()
    {
        return view('admin.account_detail');
    }
    
    function showRegisterAccount()
    {
        $user = new User();
        return view('admin.register_account');
    }

    function updateAccount(Request $request, $id){
        User::where('id', $id)
        ->update(['name' => $request->name, 'chuc_vu' => $request->chuc_vu, 'hoc_vi' => $request->hoc_vi, 'sdt' => $request->sdt]);
        return redirect('admin/account');
    }

    function mailResetPassword($name, $email, $password)
    {
        $data_mail = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        Mail::to($email)->send(new ResetMail($data_mail));
        // return true;
    }
    
    function resetPassword($id){
        $random_pass = (Str::random(10));
        
        $user = User::where('id', $id)->first(); 

        User::where('id', $id) ->update(['password' => Hash::make($random_pass)]);
        
        $this->mailResetPassword($user->name, $user->email, $random_pass);

        return redirect('admin/account');
    }





    // function of Report
    function showDetailReportPage($id)
    {
        return view('admin.report_detail');
    }





    // function of Mail
    function sendMail($name, $email, $password)
    {
        $testMailData = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        Mail::to($email)->send(new SendMail($testMailData));
        return true;
    }


    function postRegisterAccount(Request $request)
    {
        $random_pass = (Str::random(10));

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->chuc_vu = "";
        $user->hoc_vi = "";
        $user->sdt = "";
        $user->password = Hash::make($random_pass);
        
        $mailSended = $this->sendMail($request->name, $request->email, $random_pass);
        if($mailSended){
            $user->save();
            return redirect('admin/account');
        }else{
            return redirect('admin/register_account');
        }
        
    }
}
