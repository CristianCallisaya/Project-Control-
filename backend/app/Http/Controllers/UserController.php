<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //


    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer']);
    }


    public function users(){
        $user = User::all();
        return $user;
    }

    public function login(Request $request) {
            if(!FacadesAuth::attempt($request->only('email','password')))
            {
                return response()->json(['message' => 'Unauthorized'],401);
            } 
            $user = User::where('email', $request['email'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                "user" => $user,
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
    }

}
