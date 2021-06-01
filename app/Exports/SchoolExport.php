<?php

namespace App\Exports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SchoolExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return School::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'code',
            'name',
            'name_english',
            'stage',
            'address',
            'phone_number',
            'fax_number',
            'email',
            'type',
            'license_type',
            'country',
            'city',
            'area',
            'part',
            'street',
            'geolocation',
            'general_manager',
            'created_at',
            'updated_at',
        ];
    }

}
