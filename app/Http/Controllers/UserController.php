<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class UserController extends Controller
{
    public function postSignIn(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required',
    		'senha' => 'required'
    	]);

    	if (Auth::attempt(['email' => $request['email'], 'password' => $request['senha']])) {
    		return redirect()->route('dashboard');
    	}
    	return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
