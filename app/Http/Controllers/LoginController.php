<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $menu = array(
                array('nombre'=>'Home','activeSubmenu'=>0, 'url'=>'', 'submenu'=>[]),
                array('nombre'=>'Company','activeSubmenu'=>1, 'url'=>'', 'submenu'=>[array('nombre'=>'sub 1','activeSubmenu'=>'0', 'submenu'=>[]),array('nombre'=>'sub 2','activeSubmenu'=>'0', 'submenu'=>[])]),
                array('nombre'=>'Team','activeSubmenu'=>0, 'url'=>'', 'submenu'=>[]),
                array('nombre'=>'Contact','activeSubmenu'=>0, 'url'=>'', 'submenu'=>[]),
            );
	        return view('modulos.home', compact('menu'));
	    }
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('userLogged')
                    ->withSuccess('Logado Correctamente');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function userLogged()
	{
	    if (Auth::check()) {
            $menu = array(
                array('nombre'=>'Home','activeSubmenu'=>0, 'submenu'=>[]),
                array('nombre'=>'Company','activeSubmenu'=>1, 'submenu'=>[array('nombre'=>'sub 1','activeSubmenu'=>'0', 'submenu'=>[]),array('nombre'=>'sub 2','activeSubmenu'=>'0', 'submenu'=>[])]),
                array('nombre'=>'Team','activeSubmenu'=>0, 'submenu'=>[]),
                array('nombre'=>'Contact','activeSubmenu'=>0, 'submenu'=>[]),
            );
	        return view('modulos.home', compact('menu'));
	    }
	
	    return redirect("/")->withSuccess('No tienes acceso, por favor inicia sesión');
    }
}
