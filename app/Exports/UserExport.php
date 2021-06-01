<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all()->makeVisible('password');
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'password',
            'two_factor_secret',
            'two_factor_recovery_codes',
            'position',
            'remember_token',
            'created_at',
            'updated_at',
        ];
    }
}
