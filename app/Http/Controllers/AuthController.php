<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\StatusCode;
use App\Http\Controllers\UserController as UserCollection;
use App\Mail\SetEmail;
use App\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

    public function resetPassword(){
        if(Auth::check())
        return redirect()->route('admin.index');
    return view('auth.reset-password');
    }

    public function generatedToken($email){
        $data = [
            'email' => $email,
            'token' => Str::random(128),
            'created_at' => date('Y-m-d H:i:s')
        ];
        PasswordReset::create($data);
        return $data;
    }

    public function validasiResetPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray(),
            ]);
        }
        else{
            $user = User::where('email',$request->email)->first();
            if(!$user){
                return response()->json([
                    'status' => 401,
                    'error' => 'No Credential found in our record!',
                ]);
            }else{
                $token = $this->generatedToken($request->email);
                $details = [
                    'title' => 'Mail From Flores Library Admin',
                    'body' => 'Halo Admin FloresLibrary , Sepertinya kamu lupa password yah , Tenang kamu masih bisa reset password kok',
                    'data' => $token,
                ];
                Mail::to($request->email)->send(new SetEmail($details));
                return response()->json([
                    'status' => 200,
                    'message' => 'Email was send!'
                ]);
            }
        }
    }

    public function formTokenResetPassword($email,$token){
        $user = User::where('email',$email)->first();
        $token = PasswordReset::where('token',$token)->first();
        if(!$user){
            return redirect()->route('auth.form-reset-password')->with('message','no user credential found!');
        }else{
            if(!$token){
                return redirect()->route('auth.form-reset-password')->with('message','token not available or was expired!');
            }
        }
        $data = [
            'email' => $email,
            'token' => $token
        ];
        return view('auth.form-new-password',['data'=>$data]);
    }
    public function validasiTokenResetPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'error' => $validator->errors(),
            ]);
        }else{
            $user = User::where('email',$request->email)->first();
            $user->password = bcrypt($request->password);
            $user->updated_at = date('Y-m-d H:i:s',time());
            $user->save();
            $request->session()->flash('message', 'Reset Password succesfully');
            // Delete token
            PasswordReset::where('email',$request->email)->first()->delete();
            return response()->json([
                'status' => 200,
                'message' => 'reset password succesfully'
            ]);
        }
        return view('auth.form-new-password');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->back();
    }
}
