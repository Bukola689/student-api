<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
 
    public function registerUser(Request $request)
    {
       // dd('bukola');
    //    $request->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|min:8',
    //     ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return $user;

    }

   
}
