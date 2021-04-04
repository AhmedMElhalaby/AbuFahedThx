<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * @property null type
 */
class CategoryExport implements FromCollection
{
    /**
     * TargetsExport constructor.
     */
    public function __construct()
    {
        //
    }

    /**
    * @return Admin[]|Collection
    */
    public function collection()
    {
        return Category::all();
    }
}
