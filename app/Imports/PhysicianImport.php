<?php

namespace App\Imports;

use App\Models\Physicians;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhysicianImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // Define the expected headers
        $expectedHeaders = ['phy_first_name', 'phy_last_name', 'specialty', 'availability'];

        // Get the actual headers from the Excel file
        $actualHeaders = $rows->first()->keys()->toArray();

        // Check if the actual headers match the expected headers
        if ($actualHeaders !== $expectedHeaders) {
            // Redirect back with an error message
            return Redirect::back()->with('error', 'Incorrect headers. Please make sure the Excel file has the correct headers.');
        }

        // Process the rows if the headers are correct
        foreach ($rows as $row) {
            Physicians::firstOrCreate(
                [
                    'phy_first_name' => $row['phy_first_name'],
                    'phy_last_name' => $row['phy_last_name'],
                ],
                [
                    'specialty' => $row['specialty'],
                    'availability' => $row['availability'],
                ]
            );
        }
    }
}