<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * @property null type
 */
class AdminExport implements FromCollection
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
        return User::all();
    }
}
