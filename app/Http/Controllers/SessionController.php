<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function create(){
        return view('session.create');
    }

    public function store(){

        //validate the request
        
        // attempt to authenctica and lkog in user


        $attributes=request()->validate([
            'email' =>'required|exists:users,email',
            'password' =>'required'
        ]);

        if(auth()->attempt($attributes)){
            session->regenerate();

            return redirect('/')->withSuccess('sucess','welcome back');
        }

        throw ValidationException::withMessages([
            'email'=> 'crendentials could not be verifies'
        ]);

    }

    public function destroy(){

    }
}
