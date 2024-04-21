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

        return view('auth.login');
    }
}
