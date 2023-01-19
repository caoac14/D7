<?php

namespace App\Exports;

use App\Models\Room;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRoom implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dataReport = Room::join('nhom_phong', 'nhom_phong.id', '=', 'phong.ma_nhom_phong')
        ->join('loai_phong', 'loai_phong.id', '=' , 'phong.ma_loai_phong')
        ->orderBy('ten_phong', 'ASC')
        ->select('phong.id', 'ten_day_phong', 'ten_loai_phong', 'ten_phong', 'phong.created_at', 'phong.updated_at')
        ->get();
        return $dataReport;
    }
}
