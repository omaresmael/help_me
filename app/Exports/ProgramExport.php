<?php

namespace App\Exports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProgramExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Program::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'created_at',
            'updated_at',
        ];
    }

}
