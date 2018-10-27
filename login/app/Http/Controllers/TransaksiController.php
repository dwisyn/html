<?php

namespace App\Http\Controllers;
use DB;
use App\transaksi;
use App\akun_pelanggan;
use App\rumah;
use Auth;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->role == 'admin')
        {
            $transaksis = transaksi::all();
        } else {
            $transaksis = $user->akun_pelanggan->transaksis;
        }
        return view ('transaksi.index',compact('transaksis'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if($user->role == 'admin'){
	        $ap = akun_pelanggan::pluck('user','iduser');
        } else {
            $ap = [$user->akun_pelanggan->iduser => $user->username];
        }
        return view ('transaksi.create',compact('ap'));

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
        transaksi::create($request->all());        
        return redirect('/transaksi');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      	$tr    = transaksi::findorfail($id);
        $ap    = akun_pelanggan::pluck('user','iduser');
        return view('transaksi.edit',compact('tr','ap'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    	$tr = transaksi::findorfail($id);
    	$tr->update($request->all());
    	return redirect('/transaksi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tr = transaksi::findorfail($id);
        $tr->delete();
        return redirect('/transaksi');

    }
}
