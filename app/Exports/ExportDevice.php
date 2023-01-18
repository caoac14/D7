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
        $dataReport = Device::get();
        return $dataReport;
    }
}
