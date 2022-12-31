<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\Room;
use App\Models\ClassName;
use App\Models\Report;

class ReportController extends Controller
{
    function index(Request $request)
    {
        $deviceId = $request->devide;
        $deviceName = Device::where('id', $deviceId)->pluck('ten_thiet_bi');

        $listRooms = Room::get();

        $classNames = ClassName::orderBy('ten_lop', 'ASC')->get();

        return view('user.pages.report', compact('listRooms', 'deviceName', 'classNames'));
    }

    function showDevice(Request $request)
    {
        if ($request->ajax()) {
            $devices = Device::where('ma_phong', $request->room_id)->orderBy('ten_thiet_bi', 'ASC')->get();
            return response()->json($devices);
        }
    }

    function getDataReport(Request $request){
        foreach($request->device as $device){
            $idDevice = (Device::where('id', $device)->pluck('id'));
            $report = new Report;
            $report->ma_giao_vien = Auth::user()->id;
            $report->ma_phong = $request->room;
            $report->ma_lop = $request->class;
            $report->ma_thiet_bi = $idDevice[0];
            $report->mo_ta_loi = $request->about;
            $report->buoi = $request->timeR;
            $report->ngay = $request->dateR;
            $report->ghi_chu = "";
    
            $report->save();
        }
    }

    // function seachDevice(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $output = '';
    //         $divices = Device::table('thiet_bi')->where('ten_thiet_bi', 'LIKE', '%' . $request->searchDevice . '%')->get();
    //         if ($divices) {
    //             foreach ($divices as $key => $divice) {
    //                 $output .= '<p>' .$divice->then_thiet_bi .'</p>';
    //             }
    //         }
    //         return Response($output);
    //     }
    // }
}