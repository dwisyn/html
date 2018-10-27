<?php

namespace App\Http\Controllers;

use App\rumah;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	$rmh = rumah::all();
    	return view('rumah.index',compact('rmh'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	return view ('rumah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       rumah::create($request->all());       
       return redirect('/rumah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show(rumah $rumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $rmh = rumah::findorfail($id);
       return view ('rumah.edit',compact('rmh'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rmh = rumah::findorfail($id);
        $rmh->update($request->all());
        return redirect('/rumah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rmh = rumah::findorfail($id);
        $rmh->delete();
        return redirect('/rumah');

    }
}
