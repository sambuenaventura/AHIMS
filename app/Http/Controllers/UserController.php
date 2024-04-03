<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index() {
        return "Hello from UserController";
        
    }

    public function login() {
        if(View::exists('user.login')) {
            return view("user.login");
        }else {
            return abort(404);
        }
    }

    
    public function process(Request $request) {
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required',
        ]);

        if (auth()->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $request->session()->regenerate();

            // Redirect based on the user's role
            $user = auth()->user();
            if ($user->hasRole('admission')) {
                return redirect('/admission-dashboard')->with('message', 'Welcome back, ' . $user->first_name . ' ' . $user->last_name . '!');
            } 
            elseif ($user->hasRole('nurse')) {
                return redirect('/nurse-dashboard')->with('message', 'Welcome back, ' . $user->first_name . ' ' . $user->last_name . '!');
            } 
            elseif ($user->hasRole('medtech')) {
                return redirect('/medtech-dashboard')->with('message', 'Welcome back, ' . $user->first_name . ' ' . $user->last_name . '!');
            } 
            elseif ($user->hasRole('radtech')) {
                return redirect('/radtech-dashboard')->with('message', 'Welcome back, ' . $user->first_name . ' ' . $user->last_name . '!');
            } 
            elseif ($user->hasRole('admin')) {
                return redirect('/admin-dashboard')->with('message', 'Welcome back, ' . $user->first_name . ' ' . $user->last_name . '!');
            } 
            else {
                return redirect('/')->with('message', 'Welcome back!');
            }
        }

        return back()->withErrors(['email' => 'Login failed'])->withInput();
    }



    
    public function register() {
        return view('user.register');
    }

    public function viewProfile() {
        return view('user.profile');
    }
    
    public function editProfile() {
        return view('user.edit-profile');
    }

    // public function updateProfile(Request $request)
    // {    dd($request->all());

    //     $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => [
    //             'required',
    //             'string',
    //             'email',
    //             'max:255',
    //             Rule::unique('users')->ignore(auth()->user()->id),
    //         ],
    //         'student_number' => [
    //             'required',
    //             'string',
    //             'max:255',
    //             Rule::unique('users')->ignore(auth()->user()->id),
    //         ],
    //         'old_password' => 'nullable|string', // Make old password nullable
    //         'new_password' => 'nullable|string|min:8|confirmed', // Include validation rules for new password
    //         'pin' => 'nullable|string|digits:4', // Validate PIN format
    //     ]);
    
    //     $user = auth()->user();
    
    //     // Validate old password
    //     if ($request->filled('old_password')) {
    //         if (!Hash::check($request->input('old_password'), $user->password)) {
    //             return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
    //         }
    //     }
    
    //     // Update user profile fields
    //     $user->update([
    //         'first_name' => $request->input('first_name'),
    //         'last_name' => $request->input('last_name'),
    //         'email' => $request->input('email'),
    //         'student_number' => $request->input('student_number'),
    //         'pin' => $request->input('pin'), // Update PIN from the form
    //         // Update other fields as needed
    //     ]);
    
    //     // Update password if provided
    //     if ($request->filled('new_password')) {
    //         $user->password = Hash::make($request->input('new_password'));
    //         $user->save();
    //     }
    
    //     return redirect()->route('editProfile')->with('message', 'Profile updated successfully');
    // }
    
    
//     public function updateProfile(Request $request)
// {
//     $request->validate([
//         'first_name' => 'required|string|max:255',
//         'last_name' => 'required|string|max:255',
//         'email' => [
//             'required',
//             'string',
//             'email',
//             'max:255',
//             Rule::unique('users')->ignore(auth()->user()->id),
//         ],
//         'student_number' => [
//             'nullable',
//             'string',
//             'max:255',
//             Rule::unique('users')->ignore(auth()->user()->id),
//         ],
//         'old_password' => 'nullable|string', // Make old password nullable
//         'new_password' => 'nullable|string|min:8|confirmed', // Include validation rules for new password
//         'pin' => 'nullable|string|digits:4', // Validate PIN format
//     ]);

//     $user = auth()->user();

//     // Validate old password
//     if ($request->filled('old_password')) {
//         if (!Hash::check($request->input('old_password'), $user->password)) {
//             return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
//         }
//     }

//     // Update user profile fields
//     $user->update([
//         'first_name' => $request->input('first_name'),
//         'last_name' => $request->input('last_name'),
//         'email' => $request->input('email'),
//         'student_number' => $request->input('student_number'),
//         'pin' => $request->input('pin'), // Update PIN from the form
//         // Update other fields as needed
//     ]);

//     // Update password if provided
//     if ($request->filled('new_password')) {
//         $user->password = Hash::make($request->input('new_password'));
//         $user->save();
//     }

//     return redirect()->route('editProfile')->with('message', 'Profile updated successfully');
// }

    
// public function updateProfile(Request $request)
// {
//     $request->validate([
//         'first_name' => 'required|string|max:255',
//         'last_name' => 'required|string|max:255',
//         'email' => [
//             'required',
//             'string',
//             'email',
//             'max:255',
//             Rule::unique('users')->ignore(auth()->user()->id),
//         ],
//         'student_number' => [
//             'nullable',
//             'string',
//             'max:255',
//             Rule::unique('users')->ignore(auth()->user()->id),
//         ],
//         'old_password' => 'nullable|string', // Make old password nullable
//         'new_password' => 'nullable|string|min:8', // Make new password nullable with min length of 8
//         'pin' => 'nullable|string|digits:4', // Validate PIN format
//     ]);

//     $user = auth()->user();

//     // Validate old password if provided
//     if ($request->filled('old_password')) {
//         if (!Hash::check($request->input('old_password'), $user->password)) {
//             return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
//         }

//         // Update password only if new password is provided
//         if ($request->filled('new_password')) {
//             $user->password = Hash::make($request->input('new_password'));
//         }
//     }

//     // Update user profile fields
//     $user->update([
//         'first_name' => $request->input('first_name'),
//         'last_name' => $request->input('last_name'),
//         'email' => $request->input('email'),
//         'student_number' => $request->input('student_number'),
//         'pin' => $request->input('pin'), // Update PIN from the form
//         // Update other fields as needed
//     ]);

//     $user->save();

//     return redirect()->route('editProfile')->with('message', 'Profile updated successfully');
// }

public function updateProfile(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('users')->ignore(auth()->user()->id),
        ],
        'student_number' => [
            'nullable',
            'string',
            'max:255',
            Rule::unique('users')->ignore(auth()->user()->id),
        ],
        'old_password' => 'nullable|string', // Make old password nullable
        'new_password' => 'nullable|string|min:8', // Make new password nullable with min length of 8
        'pin' => 'nullable|string|digits:4', // Validate PIN format
    ]);

    $user = auth()->user();

    // Validate old password if provided
    if ($request->filled('old_password')) {
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
        }

        // Update password only if new password is provided
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }
    }

    // Update user profile fields
    $user->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'student_number' => $request->input('student_number'),
        'pin' => $request->input('pin'), // Update PIN from the form
        // Update other fields as needed
    ]);

    $user->save();

    return redirect()->route('editProfile')->with('message', 'Profile updated successfully');
}


public function deleteNotification(Notification $notification)
{
    // Debugging: Check if the authenticated user ID matches the notification's user ID
    // dd(auth()->id(), $notification->notifiable_id);
    //

    // Check if the authenticated user owns the notification
    if ($notification->notifiable_id === auth()->id()) {
        $notification->delete();
        return back()->with('success', '');
    } else {
        return back()->with('error', 'You do not have permission to delete this notification.');
    }
}





    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout successful');
    }
    

    public function store(Request $request) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:1', 'max:255'],
            "last_name" => ['required', 'min:1', 'max:255'],
            'role' => 'required|string|in:admission,nurse,radtech,medtech,admin',
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6|max:255'
        ]);
        $validated['password'] = bcrypt($validated['password']);
        
        $user = User::create($validated);

        return redirect()->back()->with('message', 'Successfuly registered!');
    }

    public function show($id) {

        // $data = array(
        //     "id" => $id,
        //     "name" => "Sam Buenaventura",
        //     "age" => 22,
        //     "email" => "samb@gmail.com"
        // );
        $data = ["data" => "data from database"];
        return view('user') 
        ->with('data', $data)
        ->with('name', 'Sam')
        ->with('age', '22')
        ->with('email', 'samb@gmail.com')
        ->with('id', $id);
    }
}
