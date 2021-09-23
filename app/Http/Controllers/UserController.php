<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Boolean;

class UserController extends Controller
{
    //
    public function store(Request $request){
        // dd($request->all());
        $data = User::create(array_merge($request->all(),['password' => Hash::make(strval(123456))]));
        return redirect()->route('admin.index');
    }
    public function update(Request $request , $id){
        $user = User::find($id);
        $status = false;
        if(strcmp($request->input('is_active'),'true')==0)
            $status = true;
        else
            $status = false;
        // dd($request->all());
        $data = array_merge($request->all(),['is_active' => $status]);
        if($user->count() > 0){
            if($request->hasFile('profile')){
                $file = $request->file('profile');
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $lastName = str_replace('/','',Hash::make($fileName)).'.'.$fileExtension;
                $file->storeAs(
                    'public/user',$lastName
                );
                $data = array_merge($data,['profile' => $lastName]);
                $user->update($data);
                return redirect()->route('admin.index');
            }
            $user->update($data);
            return redirect()->route('admin.index');
        }
        else{
            abort(404);
        }
    }
    public function getUsers(){
        $data = User::all();
        return response()->json([
            'data' => $data,
            'message' => StatusCode::http_response_code(200)
        ]);
    }

    public function getUserById($id){
        $data = User::find($id);
        if($data){
            return response()->json([
                'data' => $data,
                'message' => StatusCode::http_response_code(200)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404)
        ]);
    }

    public function getUserByEmail($email){
        $data = User::where('email',$email)->get();
        if($data){
            return response()->json([
                'data' => $data,
                'message' => StatusCode::http_response_code(200)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404)
        ]);
    }

    public function addUser(Request $request){
        $data = User::create(array_merge($request->all(),['password' => md5(strval(123456))]));
        if($data){
            return response()->json([
                'data' => $data,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(406)
        ]);
    }

    public function updateUser(Request $request,$id){
        $data = User::find($id);
        if($data){
            $data->update($request->all());
            return response()->json([
                'data' => User::find($id),
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404)
        ]);
    }

    public function deleteUser($id){
        $data = User::find($id);
        if($data){
            if($data->delete()){
                return response()->json([
                    'response' => 'Record was Delete',
                    'message' => StatusCode::http_response_code(202)
                ]);
            }
            //Failde Deleete
            return response()->json([
                'message' => StatusCode::http_response_code(406)
            ]);

        }
        //Record not found
        return response()->json([
            'message' => StatusCode::http_response_code(404)
        ]);
    }
}
