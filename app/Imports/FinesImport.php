<?php

namespace App\Imports;

use App\Fines;
use App\Models\Fine;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class FinesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
            return new Fine([
                'id'=>$row[0],
                'issuer_name'=>$row[1],
                'amount'=>$row[2],
                'reason'=>$row[3],
                'school_id'=>$row[4],
                'created_at'=> $row[5],
                'updated_at'=> $row[6],
            ]);
    }
}
