<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function signup(Request $req){
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            //'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
        ]);

        $user->save();

        return response()->json([
            'message' => 'Register Berhasil'
        ], 201);
    }

    public function login(Request $req){
        $req->validate([
            'email' => 'required|string',
            'password' => 'required|string',            
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);

        $user = $req->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();

        return response()->json([
            'token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'message' => 'Login Berhasil'
        ]);
    }

    public function logout(Request $req){
        $req->user()->token()->revoke();

        return response()->json([
            'message' => 'Logout Berhasil'
        ]);
    }

    public function user(Request $req){
        return response()->json($req->user());
    }
}
