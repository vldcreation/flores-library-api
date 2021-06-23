<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\StatusCode;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $getUser = this::getUser($username,$password);
        if($getUser){
            return response()->json([
                'data' => $getUser,
                'message' => StatusCode::http_response_code(201)
            ]);
        }

        return response()->json([
            'message' => 'Username or Password not credential in our Record!'
        ]);

        // return ;
    }

    public function getUser($username,$password){
        $user = User::whereColumn ([
            ['email', '=',$username ],
            ['password', '=', md5($password)],
        ])->orWhereColumn([
            ['username', '=',$username ],
            ['password', '=', md5($password)],
        ])->get();

        return $user;
    }
}
