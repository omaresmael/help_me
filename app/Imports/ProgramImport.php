<?php

namespace App\Imports;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class ProgramImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
            return new Program([
                'id'=>$row[0],
                'name'=>$row[1],
                'created_at'=> $row[2],
                'updated_at'=> $row[3],
            ]);
    }
}
