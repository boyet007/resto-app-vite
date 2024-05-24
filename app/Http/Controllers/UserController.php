<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signUp(Request $request) {
        $request->validate([
            'name' => 'required',
            "email"=> "required|email|unique:users",
            'password' => ['required', Password::min(6)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()]
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        return response()->json(['pesan' => 'User baru berhasil dibuat.', 'user' => $user], 201);
    }
 
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

            if (!$token = Auth::attempt($credentials)) {
                return response()->json(['error' => 'User atau password salah.'], 401);
            }

            return response()->json([
                'status' => 'berhasil',
                'user' => auth()->user(),
                'token' => $token
            ]);

        } catch (\Exception $e) {
            return response(['status' => 'kesalahan.', 'error' => $e->getMessage()], 500);
        }
    }
}
