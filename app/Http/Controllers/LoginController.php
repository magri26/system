<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Modulos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            
            $user = Auth::user();
            $menu = array(
                array('nombre'=>'Dashboard','activeSubmenu'=>0, 'url'=>'', 'icon'=>'fa-tachometer-alt', 'submenu'=>[]),
                array('nombre'=>'Tickets','activeSubmenu'=>1, 'url'=>'', 'icon'=>'fa-tachometer-alt', 'submenu'=>[array('nombre'=>'sub 1','activeSubmenu'=>'0', 'submenu'=>[]),array('nombre'=>'sub 2','activeSubmenu'=>'0', 'submenu'=>[])]),
                array('nombre'=>'Usuarios','activeSubmenu'=>0, 'url'=>'', 'icon'=>'fa-tachometer-alt', 'submenu'=>[]),
                array('nombre'=>'Mantenedores','activeSubmenu'=>0, 'url'=>'', 'icon'=>'fa-tachometer-alt', 'submenu'=>[]),
            );
	        return view('modulos.home', compact('menu','user'));
	    }
        /*$user = new User();
        $user->name = "Michael";
        $user->email = "maikelpezoa@gmail.com";
        $user->password = "12345678";
        $user->save();*/
        /*$menu = new Menu();
        $menu->nombre = "Dashboard";
        $menu->icon = "fa-tachometer-alt";
        $menu->save();*/
        $modulo = new Modulos();
        $modulo->menu_id = "1";
        $modulo->nombre = "Dashboard 1";
        $modulo->icon = "fa-tachometer-alt";
        $modulo->save();
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
 
            return redirect()->intended('home')
                    ->withSuccess('Logado Correctamente');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function userLogged()
	{
	    if (Auth::check()) {
            $user = Auth::user();
            $menu = array(
                array('nombre'=>'Dashboard','activeSubmenu'=>0, 'url'=>'', 'icon'=>'fa-tachometer-alt', 'submenu'=>[]),
                array('nombre'=>'Company','activeSubmenu'=>1, 'url'=>'', 'icon'=>'fa-tachometer-alt', 'submenu'=>[array('nombre'=>'sub 1','activeSubmenu'=>'0', 'submenu'=>[]),array('nombre'=>'sub 2','activeSubmenu'=>'0', 'submenu'=>[])]),
                array('nombre'=>'Team','activeSubmenu'=>0, 'url'=>'', 'icon'=>'fa-tachometer-alt', 'submenu'=>[]),
                array('nombre'=>'Contact','activeSubmenu'=>0, 'url'=>'', 'icon'=>'fa-tachometer-alt', 'submenu'=>[]),
            );
	        return view('modulos.home', compact('menu','user'));
	    }
	
	    return redirect("/")->withSuccess('No tienes acceso, por favor inicia sesión');
    }
}
