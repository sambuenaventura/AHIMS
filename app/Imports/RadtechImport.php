<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RadtechImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // Define the expected headers
        $expectedHeaders = ['first_name', 'last_name', 'role', 'email', 'student_number', 'password'];

        // Get the actual headers from the Excel file
        $actualHeaders = $rows->first()->keys()->toArray();

        // Check if the actual headers match the expected headers
        if ($actualHeaders !== $expectedHeaders) {
            // Throw an exception with an error message
            throw new \Exception('Incorrect headers. Please make sure the Excel file has the correct headers.');
        }

        // Check if all role values are "radtech"
        $roles = $rows->pluck('role')->unique();
        if ($roles->count() !== 1 || $roles->first() !== 'radtech') {
            // Throw an exception with an error message
            throw new \Exception('Invalid role values. All role values should be "radtech".');
        }

        foreach ($rows as $row) 
        {
            $user = User::where('email', $row['email'])->first();
            if($user) {
                $user->update([
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'role' => $row['role'],
                    'student_number' => $row['student_number'],
                    'password' => $row['password'],
                ]);
            } else {
                User::create([
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'role' => $row['role'],
                    'email' => $row['email'],
                    'student_number' => $row['student_number'],
                    'password' => $row['password'],
                ]);
            }
        }
    }
}
