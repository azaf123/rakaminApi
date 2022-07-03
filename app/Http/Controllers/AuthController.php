<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function login_store(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token], 200);
            return redirect('/api/v1/articles',302,['Authorization' => 'Bearer '.$accessToken]);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

    }
    public function register()
    {
        return view('auth.register');
    }
    public function register_store(Request $request)
    {
        // return 'register';
        // return $request;
        $user = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);
        $user['password'] = bcrypt($user['password']);
        $user = User::create($user);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response()->json([
            'user' => $user,
            'access_token' => $accessToken
        ], 200);
    }

    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }
    // logout
    public function logout(Request $request) {
        if ($request->user()) { 
            $request->user()->tokens()->delete();
        }
    
        return response()->json(['message' => 'Delete'], 200);
    }
    
}
