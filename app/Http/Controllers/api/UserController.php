<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use Response;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct() {
    	$this->content = array();
    }

    public function login() {
    	if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
    		$user = Auth::user();
    		$this->content['token'] = $user->createToken('Pizza App')->accessToken;
            $this->content['slots'] = $user->slots;
    		$status = 200;
    	} else {
    		$this->content['error'] = "Unauthorised";
    		$status = 401;
    	}

    	return response()->json($this->content, $status);
    }

    public function register() {
    	$user = new User;
    	$user->email = request('email');
    	$user->password = Hash::make(request('password'));
    	$user->name = request('name');
    	$user->type = 'user';
    	$user->save();

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $this->content['token'] = $user->createToken('Pizza App')->accessToken;
            $status = 200;
        } else {
            $this->content['error'] = "Unauthorised";
            $status = 401;
        }

        return response()->json($this->content, $status);
    	//return response()->json(['user' => Auth::user()]);
    }

    public function details() {
    	return response()->json(['user' => Auth::user()]);
    }

    public function update(Request $request) {
        $user = Auth::user();

        if($request->has('email')) {
            $user->email = $request->input('email');
        }

        if($request->has('password') && $request->input('password') != "") {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return $user;
    }
}
