<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ]);
        $user = User::where('email' , $data['email'])->first();
        if(!$user || !Hash::check($data['password'], $user->password) ){
            return response()->json([
                "message" => 'There is an error in the email or password. '
            ]);
        }
        $token = $user->createToken($user->name . '-authtoken')->plainTextToken;
        return response()->json([
            "user_information" => $user ,
            "token" => $token 
        ]);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            "message" => "logged out successfully"
        ]);
    }
}
