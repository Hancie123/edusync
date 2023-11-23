<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){

        $credentials=$request->only('email','password');

        try{
            if(Auth::attempt($credentials)){
                $user=Auth::user();
                $token=$user->createToken('login_token')->accessToken;
                return responseSuccess(['data'=>$user,'token'=>$token],200,'You have login successfully!');

            }
            else{
                return responseError("Invalid Credential",500);
            }


        }
        catch(\Exception $e){
            return responseError($e->getMessage(),500);

        }


    }
}
