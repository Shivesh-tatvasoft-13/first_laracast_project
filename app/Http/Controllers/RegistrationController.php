<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        return view('form');
    }

    

    public function register(Request $request)
    {
        
       $attributes= $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'password' => 'required',
        ]);
           
       
        $user=User::create($attributes);

        // log in user

        auth()->login($user);

        // session()->flash('success',"your account has been created");

        return redirect('/register');
    }
}
