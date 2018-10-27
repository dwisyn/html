<?php

namespace App\Http\Controllers;
use DB;
use App\akun_pelanggan;
use App\rumah;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;

class AkunPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if($user->role == 'admin') {
            $akun_pelanggan = akun_pelanggan::all();
        } else {
            $rumah = rumah::where('idrumah' ,$user->akun_pelanggan->idrumah_fk)->first();
            $akun_pelanggan = $rumah->akun_pelanggans;
        }
        return view ('akun_pelanggan.index',compact('akun_pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->role == 'admin') {
            $rmh = rumah::pluck('alamat','idrumah');
        } else {
            $rumah = $user->akun_pelanggan->rumah;
            $rmh = [$rumah->idrumah => $rumah->alamat];
        }
        return view ('akun_pelanggan.create',compact('rmh'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|string|email|max:190|unique:akun_pelanggan',
                    'user' => 'required|string|unique:akun_pelanggan',
                    'iduser' => 'required|numeric|unique:akun_pelanggan',
                ]);

        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        else
        {
            $user['name'] = $request->user;
            $user['email'] = $request->email;
            $user['username'] = $request->user;
            $user['role'] = 'pelanggan';
            $user['password'] = bcrypt($request->password);
            User::create($user);

            $akun_user = User::where('email', $request->email)->first();

            $akun_pelanggan = $request->all();
            $akun_pelanggan['user_id'] = $akun_user->id;
            akun_pelanggan::create($akun_pelanggan);

            return redirect('/akun_pelanggan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\akun_pelanggan  $akun_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(akun_pelanggan $akun_pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\akun_pelanggan  $akun_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ap    = akun_pelanggan::findorfail($id);
        $rmh   = rumah::pluck('alamat','idrumah');
        return view('akun_pelanggan.edit',compact('ap','rmh'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\akun_pelanggan  $akun_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|string|email|max:190|unique:akun_pelanggan',
                    'user' => 'required|string|unique:akun_pelanggan',
                    'iduser' => 'required|numeric|unique:akun_pelanggan',
                ]);

        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        else
        {
        	$ap = akun_pelanggan::findorfail($id);
            $user = User::findorfail($ap->user_id);
            $data['name'] = $request->user;
            $data['email'] = $request->email;
            $data['username'] = $request->user;
            $data['role'] = 'pelanggan';
            $data['password'] = bcrypt($request->password);
            $user->update($data);
        	$ap->update($request->all());
        	return redirect('/akun_pelanggan');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\akun_pelanggan  $akun_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ap = akun_pelanggan::findorfail($id);
        $user = User::findorfail($ap->user_id);
        $ap->delete();
        $user->delete();
        return redirect('/akun_pelanggan');

    }
}
