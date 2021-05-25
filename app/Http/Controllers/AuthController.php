<?php

namespace App\Http\Controllers;

use App\Helper\MetadataHelper;
use app\Helper\SortHelper;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //



    public function handleSignUp(Request $request){
        //dd("Inside");
        if(Auth::check()){
            abort(403);
        }

        $request->validateWithBag('signup', [
            "username" => ['required', 'unique:App\Models\User,name', 'max:20'],
            "email" => ["required", 'unique:App\Models\User,email', 'email'],
            "password" => ['required', 'max:20'],
            "password2" => ['required', 'max:20']
        ]);

        $credentials = $request->only('email', 'username', 'password', 'password2');
        
        if(strcmp($credentials['password'], $credentials['password2']) != 0){
            return Redirect::route('auth_sign_up_show')->with( ['sign_up_error' => "Passwords don't match"] );
        }

        $user = new \App\Models\User;
        $user->password = Hash::make($credentials['password']);
        $user->email = $credentials['email'];
        $user->name = $credentials['username'];
        $user->save();
        return redirect(route('auth_sign_in_show'));
    }

    public function showSignUp(Request $request){
        if(Auth::check()){
            return redirect(route('index'));
        }
        $routeName = $request->route()->getName();
        $metadata = MetadataHelper::assembleMetadata($routeName, []);
        return view("blog.auth_sign_up", array_merge($metadata));
    }

    public function showSignIn(Request $request){
        if(!Auth::check()){
            $routeName = $request->route()->getName();
            $metadata = MetadataHelper::assembleMetadata($routeName, []);
            return view("blog.auth_sign_in", array_merge($metadata));
            //return view("blog.auth_sign_in");
        }else{
            return redirect(route('index'));
        }
    }

    public function handleSignIn(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(route('index'));
        }else{
            return redirect(route('auth_sign_in_show'));
        }
    }

    public function handleSignOut(){
        Auth::logout();
        return redirect(route('index'));
    }
}
