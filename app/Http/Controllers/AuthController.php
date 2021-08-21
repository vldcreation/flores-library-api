<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\StatusCode;
use App\Http\Controllers\UserController as UserCollection;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $getUser = $this->getUser($username,$password);
        if($getUser->count() > 0){
            return response()->json([
                'data' => $getUser,
                'message' => StatusCode::http_response_code(201)
            ]);
        }

        return response()->json([
            'message' => 'Username or Password not credential in our Record!'
        ]);
    }

    public function getUser($username,$password){
        $user = User::where ([
            ['email', '=',$username ],
            ['password', '=', md5($password)],
        ])->orWhere([
            ['username', '=',$username ],
            ['password', '=', md5($password)],
        ])->get();

        return ($user !== null) ? $user : null;
    }

    public function index(){
        return view('auth.index');
    }
    public function validasi(Request $request){
        $credentials = $request->only('username','password');
        // dd($credentials);
        if(Auth::attempt($credentials)){
            $request->session()->put('isLogin',true);
            return redirect()->route('admin.loan.index');
        }
        return view('auth.index');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->back();
    }
}
