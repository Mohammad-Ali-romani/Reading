<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $home = Setting::find(1);
        if(empty($home)){
            Setting::create([
                'logo'=>'none',
                'whatsapp'=>'none',
                'facebook'=>'none',
                'instegram'=>'none'
            ]);
            $home = Setting::find(1);
        }


        return view('back.controlHome',compact('home'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $home = Setting::find($id);
        if($request->hasFile('logo')){
            // delete file last
            unlink($home->logo);
            // add file
            $file = $request->logo;
            $filename = time().$file->getClientOriginalName();
            $file->move('img',$filename);
            $home->logo = "img/".$filename;
        }
        $home->whatsapp = $request->whatsapp;
        $home->facebook = $request->facebook;
        $home->instegram = $request->instegram;
        $home->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
