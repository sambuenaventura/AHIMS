<?php

namespace App\Imports;

use App\Models\Physicians;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhysicianImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // dd($row);

            Physicians::create([
                'phy_first_name' => $row['first_name'],
                'phy_last_name' => $row['last_name'],
                'specialty' => $row['specialty'],
                'availability' => $row['availability'],
            ]);
        }
    }
}
