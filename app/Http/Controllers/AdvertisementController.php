<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('back.advertisement.index',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('upload_photo')){
            $file = $request->upload_photo;
            $fileName = time() . $file->getClientOriginalName();
            $file->move('uploads/advertisements',$fileName);
        }
        Advertisement::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'photo'=>'uploads/advertisements/' . $fileName
        ]);
        return redirect()->route('advertisement.index');
        // يتبع من هنا ....
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
        $ad = Advertisement::find($id);
        return view('back.advertisement.edit',compact('ad'));
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
        $ad = Advertisement::find($id);
        if($request->hasFile('upload_photo')){
            $file = $request->upload_photo;
            $fileName = time() . $file->getClientOriginalName();
            $file->move('uploads/advertisements',$fileName);
            unlink($ad->photo);
            $ad->photo = 'uploads/advertisements/'.$fileName;
        }
        $ad->title = $request->title;
        $ad->content = $request->content;
        $ad->save();
        return redirect()->route('advertisement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Advertisement::find($id);
        unlink($ad->photo);
        $ad->delete();
        return back();
    }
}
