<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CredentialValidationService
{
    public static function validateCredentials($request)
    {
        $user = Auth::user();

        if ($user->pin) {
            $request->validate([
                'credential' => 'required|string',
            ]);

            $credential = $request->input('credential');

            if ($credential !== $user->pin) {
                return redirect()->back()->withInput()->with('error', 'Incorrect PIN. Please try again.');
            }
        } else {
            $request->validate([
                'credential' => 'required|string',
            ]);

            $credential = $request->input('credential');

            if (!Hash::check($credential, $user->password)) {
                return redirect()->back()->withInput()->with('error', 'Incorrect password. Please try again.');
            }
        }

        return null; // Return null when credentials are correct
    }
}