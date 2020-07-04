<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class APILoginController extends Controller
{   
    public function index(){
        return view('manager.login');
    }

    public function login(Request $request){

        //just allow the manager email
        if($request->email != 'correo@correo.com'){
            return response(['message'=>'User No Authorized']);
        }
        //validation
        $login = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        //check credentials
        if(!Auth::attempt($login)){
            return response(['message'=>'Invalid password']);
        }

        //new token
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user' => Auth::user(), 'token' => $accessToken]);
    }
}
