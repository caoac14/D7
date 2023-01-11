<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\Room;
use App\Models\GroupRoom;
use App\Models\ClassName;
use App\Models\GroupDevice;
use App\Models\Report;

class ReportController extends Controller
{
    function index(Request $request)
    {
        $deviceId = $request->devide;
        $deviceName = Device::where('id', $deviceId)->pluck('ten_thiet_bi');

        $listRooms = GroupRoom::orderBy('ten_day_phong', 'ASC')->get();

        $classNames = ClassName::orderBy('ten_lop', 'ASC')->get();

        return view('user.pages.report', compact('listRooms', 'deviceName', 'classNames'));
    }

    function showRoomAjax(Request  $request){
        if ($request->ajax()) {
            $rooms = Room::where('ma_nhom_phong', $request->groupRoom_id)->orderBy('ten_phong', 'ASC')->get();
            return response()->json($rooms);
        }
    }

    function showDevice(Request $request)
    {
        if ($request->ajax()) {
            $devices = Device::all();
            return response()->json($devices);
        }
    }


    function getDataReport(Request $request){
        $report = new Report;
        $report->ma_giao_vien = Auth::user()->id;
        $report->ma_phong = $request->room;
        $report->ma_lop = $request->class;
        $report->mo_ta_loi = $request->about;
        $report->buoi = $request->timeR;
        $report->ngay = $request->dateR;
        $report->ghi_chu = "";
        $report->save();

        
        $idLastReport = Report::get()->last()->id;
        foreach($request->device as $device){
            $groupDevice = new GroupDevice();
            $groupDevice->ma_nhat_ky = $idLastReport;
            $groupDevice->ma_thiet_bi = $device;
            $groupDevice->save();
        }
        
        return redirect()->back();
    }
}