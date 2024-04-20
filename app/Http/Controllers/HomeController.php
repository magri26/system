<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        /*$user = new User;
        $user->name = "Michael";
        $user->email = "maikelpezoa@gmail.com";
        $user->password = "12345678";
        $user->save();*/

        if (Auth::check()) {
	        return view('modulos.home');
	    }

        return view('auth.login');
    }
}
