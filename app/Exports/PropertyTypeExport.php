<?php

namespace App\Exports;

use App\Models\PropertyType;
use Maatwebsite\Excel\Concerns\FromCollection;

class PropertyTypeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PropertyType::all();
    }
}
