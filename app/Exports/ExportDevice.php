<?php

namespace App\Exports;

use App\Models\Device;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDevice implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dataReport = Device::join('phong', 'phong.id', '=', 'thiet_bi.ma_phong')
        ->join('loai_thiet_bi', 'loai_thiet_bi.id', '=', 'thiet_bi.ma_loai_thiet_bi')
        ->orderBy('ma_phong', 'ASC')
        ->select(
            'thiet_bi.id',
            'ten_phong',
            'ten_loai_thiet_bi',
            'ten_thiet_bi',
            'thiet_bi.created_at',
            'thiet_bi.updated_at',
        )->get();
        return $dataReport;
    }
}
?>