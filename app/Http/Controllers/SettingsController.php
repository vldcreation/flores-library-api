<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FloresProfile;
use App\Http\Resources\ProfileResource;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $floresProfile = FloresProfile::first();
        return view('settings.flores-profile.index',compact('floresProfile'));
    }

    public function profile(){
        return response()->json(new ProfileResource(FloresProfile::first()));
    }

    public function accountData(){
        $data = [
            'id',
            'name',
            'email',
            'no_telp'
        ];
        $adminAccount = User::firstWhere('role',1)->only($data);
        $adminAccount['no_telp'] = str_replace('+62','',str_replace('-','',$adminAccount['no_telp']));
        return response()->json([
            'status' => 200,
            'data' => $adminAccount
        ]);
    }

    public function accountUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:30',
            'no_telp' => 'required',
            'password' => 'required',
        ],
    );
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        }else{
            $user = User::find($request->id);
            if(!Hash::check($request->password, $user->password)){
                return response()->json([
                    'status' => 401,
                    'error' => 'Wrong password credential!'
                ]);
            }
            else{
                $request->no_telp = '+'.preg_replace('/[^0-9]/', '', $request->no_telp);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->no_telp = $request->no_telp;
                $user->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Success update data...'
                ]);
            }
        }
    }

    public function passwordUpdate(Request $request){
        $validator = Validator::make($request->all(),[
            'password2' => 'required',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ],[
            'password2.required' => 'The password field is required.'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'errors' => $validator->getMessageBag()
            ]);
        }else{
            $user = User::find($request->id);
            if(!Hash::check($request->password2, $user->password)){
                return response()->json([
                    'status' => 401,
                    'error' => 'Wrong password credential!'
                ]);
            }
            else{
                $user->password = Hash::make($request->new_password);
                $user->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Success update password!...'
                ]);
        }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FloresProfile  $floresProfile
     * @return \Illuminate\Http\Response
     */
    public function show(FloresProfile $floresProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FloresProfile  $floresProfile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $floresProfile = FloresProfile::first();
        // dd($floresProfile);
        return view('settings.flores-profile.edit',['profile' => $floresProfile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FloresProfile  $floresProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = FloresProfile::first();
        // dd($request->all());
        $data2 = array();
        if($request->hasfile('path_image')){
            $file = $request->file('path_image');
            $extension = $file->getClientOriginalExtension();
            $namefile = str_replace('/','',Hash::make($file->getClientOriginalName()));
            $lastfilename = $namefile.'.'.$extension;
            $path = $file->storeAs(
                'public/file-image',$lastfilename
            );
            $data2 = array_merge($request->all(),['path_image' => $lastfilename]);
            // dd($data2);
            $data->update($data2);
            return redirect()->back();
        }
        // dd($data2);
        $data->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FloresProfile  $floresProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(FloresProfile $floresProfile)
    {
        //
    }
}
