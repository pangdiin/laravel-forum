<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;

class UserController extends Controller
{

	private $rules = [
		'name'=>['required','min:5'],
		'email'=>['email','required'],
		'password'=>['required']
	];

    public function getRegister()
    {
    	return view('auth.register');
    }

    public function postRegister(Request $request)
    {
    	$this->validate($request, $this->rules);

    	$user = new User([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>bcrypt($request->password)
    	]);

    	$user->save();

    	Auth::login($user);

    	return redirect()->route('home');
    }

    public function getLogin()
    {
    	return view('auth.login');
    }

    public function postLogin(Request $request)
    {
    	$this->validate($request,[
    		'email'=>'email|required',
    		'password'=>'required'
    		]);

    	if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
    		return redirect()->route('home');
    	} else {
    		return redirect()->back();
    	}
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('home');
    }
}

