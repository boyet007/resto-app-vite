<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'signUp']]);
    // }

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

        $token = JwtAuth::fromUser($user);
        return response()->json(['pesan' => 'User baru berhasil dibuat.', 'user' => $user, 'token' => $token], 201);
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

            if (Auth::attempt($credentials)) {
                $token = JwtAuth::fromUser(Auth::user());
                return $this->respondWithToken($token);
            }
            return response()->json(['error' => 'User atau password salah.'], 401);

        } catch (\Exception $e) {
            return response(['status' => 'kesalahan.', 'error' => $e->getMessage()], 500);
        }
    }

    public function me(Request $request) {
        $token =  JWTAuth::getToken();
        try {
            $user = JWTAuth::toUser($token);
            return response()->json(['pesan' => 'User berada dalam sesi.', 'user' => $user], 201);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['pesan' => 'Token sudah kadaluwarsa'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['pesan'=> $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response(['status'=> 'error', 'pesan' => 'Ada Kesalahan'],500);
        }
    }

    public function refresh(Request $request) {
        try {
            $newToken = JWTAuth::refresh(JWTAuth::getToken());
            return response()->json(['token' => $newToken]);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['pesan' => 'Tidak bisa merefresh token'], 500);
        }
    }

    public function logout() {
        try {
            $removeToken = JWTAuth::invalidate(JWTAuth::getToken());
            if($removeToken) {
                return response()->json([
                    'status' => 'sukses',
                    'pesan' => 'Logout Berhasil!',  
                ]);
            }
        } catch (\Exception $e) {
            return response(['status'=> 'error', 'pesan' => 'Ada Kesalahan'],500);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => 'berhasil',
            'user' => auth()->user(),
            'token' => $token,
            'masa_berlaku' => Auth::guard('api')->factory()->getTTL() * 60 
        ]);
    }   
}
