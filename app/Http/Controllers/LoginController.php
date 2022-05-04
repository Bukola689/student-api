<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $user = User::whereEmail($credentials['email'])->first();

            if (! $user || ! Hash::check($credentials['password'], $user->password) || ! $user->is_active) {
               // return  $this->unauthenticatedResponse('Invalid Credentials.');
               return "invalid";
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return  $token;
        } catch (\Exception $e) {
            report($e);
            return $e;
        }
            
    }
}
