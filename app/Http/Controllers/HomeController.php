<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        if(auth()->user()){
            return redirect('home');
        }else{
            // return view('auth.login');
            return redirect('login');
        }

    }
}
