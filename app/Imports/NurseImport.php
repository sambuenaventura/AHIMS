<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NurseImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // dd($row);

            $user = User::where('email', $row['email']->first());
            if($user) {
                $user->update([
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'role' => $row['role'],
                    'student_number' => $row['student_number'],
                    'password' => $row['password'],
                ]);
            }else {
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
