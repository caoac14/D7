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
        $dataReport = Room::get();
        return $dataReport;
    }
}
