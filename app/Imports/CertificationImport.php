<?php

namespace App\Imports;

use App\Models\Certification;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CertificationImport implements ToModel
{
    private $Category;

    public function __construct($Category)
    {
        $this->Category = $Category;
    }

    /**
     * @param array $row
     *
     * @return Certification
     */
    public function model(array $row)
    {
        return Certification::create([
            'category_id'=>$this->Category,
            'civil_registry'=>@$row[1],
            'name'=>@$row[0],
        ]);
    }

}
