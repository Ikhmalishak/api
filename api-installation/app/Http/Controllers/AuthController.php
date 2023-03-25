<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validate request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'name' => 'required'
        ]);

        try{
            //pass array
            $user = User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);
            return $this->return_api(true,Response::HTTP_OK,null,$user,null);
        
        }catch(\Throwable $th){
            return $this->return_api(false,Response::HTTP_UNAUTHORIZED, trans("auth.failed"),null);
        }
    }
    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated,true)){
            $user = Auth::user();
            $user->access_token =  $user->createToken('authToken')->plainTextToken;
            return $this->return_api(true,Response::HTTP_OK,'Successfully Logged In',$user);

        }else{
            return $this->return_api(false,Response::HTTP_UNAUTHORIZED,'Failed to Logged In',null);
        }
    }
    
}
