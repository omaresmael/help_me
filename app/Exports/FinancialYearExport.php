<?php

namespace App\Exports;

use App\Models\FinancialYear;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use phpDocumentor\Reflection\Types\Collection;

class FinancialYearExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'id',
            'year',
            'status',
            'start_at',
            'end_at',
            'created_at',
            'updated_at',
        ];
    }
    public function collection()
    {
        return FinancialYear::all();
    }
}
