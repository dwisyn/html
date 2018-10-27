<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
    	return view('auth.login');
    }

    public function doLogin(Request $request)
    {
    	$username = $request->username;
        $password = $request->password;
    	if(Auth::attempt(['username'=>$username,'password'=>$password])) {
    		if(Auth::user()->role == 'admin'){
    			return redirect('/rumah');
    		} elseif(Auth::user()->role == 'pelanggan') {
    			return redirect('/transaksi');
    		} else {
    			Auth::logout();
    			return redirect('/login');
    		}
    	} else {
    		return redirect('/login');
    	}
    }

    public function doLogout(Request $request)
    {
    	Auth::logout();
    	return redirect('/');
    }
}
