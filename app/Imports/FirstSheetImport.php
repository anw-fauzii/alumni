<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class FirstSheetImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'SISWA' => new SiswaImport(),
        ];
    }
}