<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
                '_remember_me' => 'boolean',
            ]);
            $remember = $request->input('_remember_me');
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login Success',
                ]);
            } elseif (Auth::attempt(['email' => $request->username, 'password' => $request->password], $remember)) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login Success',
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Login Failed',
                ], 401);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function logout(Request $request) {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json([
                'metadata' => [
                    'status' => 'success',
                    'message' => 'Logout Success',
                ],
                'response' => ''
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'metadata' => [
                    'status' => 'error',
                    'message' => $th->getMessage(),
                ],
                'response' => ''
            ], 500);        
        }
    }

    public function profile() {
        return response()->json([
            'metadata' => [
                'status' => 'success',
                'message' => 'Profile Success',
            ],
            'response' => Auth::user()
        ]);
    }
}
 