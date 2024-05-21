<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email salah.',
            'password.required' => 'Password harus diisi.'
        ]);

        try {
            $credentials = request(['email', 'password']);

            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return response()->json([
                'status' => 'berhasil',
                'user' => auth()->guard('api')->user(),
                'token' => $token
            ]);

        } catch (\Exception $e) {
            return response(['status' => 'kesalahan.', 'error' => $e->getMessage()], 500);
        }
    }
}
