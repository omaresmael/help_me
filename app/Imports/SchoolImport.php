<?php

namespace App\Imports;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class SchoolImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
            return new School([
                'id'=>$row[0],
                'code'=>$row[1],
                'name'=>$row[2],
                'name_english'=>$row[3],
                'stage'=>$row[4],
                'address'=>$row[5],
                'phone_number'=>$row[6],
                'fax_number'=>$row[7],
                'email'=>$row[8],
                'type'=>$row[9],
                'license_type'=>$row[10],
                'country'=>$row[11],
                'city'=>$row[12],
                'area'=>$row[13],
                'part'=>$row[14],
                'street'=>$row[15],
                'geolocation'=>$row[16],
                'general_manager'=>$row[17],
                'created_at'=> $row[18],
                'updated_at'=> $row[19],
            ]);
    }
}
