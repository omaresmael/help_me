<?php

namespace App\Imports;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0]!='id')
            return new User([
                'id'=>$row[0],
                'name'=>$row[1],
                'email'=>$row[2],
                'password'=>$row[3],
                'two_factor_secret'=>$row[4],
                'two_factor_recovery_codes'=>$row[5],
                'position'=>$row[6],
                'remember_token'=>$row[7],
                'created_at'=> $row[8],
                'updated_at'=> $row[9],
            ]);
    }
}
