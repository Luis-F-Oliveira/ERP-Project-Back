<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;
            $cookie = cookie('jwt', $token, 60 * 24);

            return response()->json([
                'token' => $token,
                'user' => $user
            ])->withCookie($cookie);
        }

        return response()->json([
           'message' => 'Invalid Credentials'
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
           'message' => 'Successfully logged out'
        ]);
    }
}
