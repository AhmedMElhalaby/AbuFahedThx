<?php

namespace App\Exports;

use App\Models\Certification;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * @property null type
 */
class CertificationExport implements FromCollection
{
    /**
     * TargetsExport constructor.
     */
    public function __construct()
    {
        //
    }


    /**
     * @return Certification[]|Collection|\Illuminate\Support\Collection
     */
    public function collection()
    {
        return Certification::all();
    }
}
