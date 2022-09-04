<?php

namespace App\Imports;

use App\Models\predictions;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Mpeke_DataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        if(!predictions::where('date', '=', $row['date'])->exists()) {
            return new predictions([
                'date'  =>  $row['date'],
                'open'  =>  $row['open'],
                'high'  =>  $row['high'],
                'low'   =>  $row['low'],
                'close' =>  $row['close'],
                'volume'=>  $row['volume'],
            ]);
        }
    }
    
}
