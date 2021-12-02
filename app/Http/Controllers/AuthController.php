<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\StatusCode;
use App\Http\Controllers\UserController as UserCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        if(Auth::check())
            return redirect()->route('admin.index');
        return view('auth.index');
    }
    public function validasi(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray(),
            ]);
        }
        else{
            $credentials = $request->only('username','password');
            // dd($credentials);
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                $request->session()->put('isLogin',true);
                return response()->json([
                    'status' => 200,
                    'message' => 'login success!'
                ]);
            }
            else{
                return response()->json([
                    'status' => 401,
                    'error' => 'username or password is incorrect',
                ]);
            }
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->back();
    }
}
