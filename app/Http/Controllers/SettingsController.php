<?php

namespace App\Http\Controllers;

use App\FloresProfile;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
