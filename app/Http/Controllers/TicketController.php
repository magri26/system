<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        //$user = new User();
        //$user->name = "Michael";
        //$user->email = "maikelpezoa@gmail.com";
        //$user->password = "12345678";
        //$user->save();

        $menu = array(
            array('nombre'=>'Home','activeSubmenu'=>0, 'submenu'=>[]),
            array('nombre'=>'Company','activeSubmenu'=>1, 'submenu'=>[array('nombre'=>'sub 1','activeSubmenu'=>'0', 'submenu'=>[]),array('nombre'=>'sub 2','activeSubmenu'=>'0', 'submenu'=>[])]),
            array('nombre'=>'Team','activeSubmenu'=>0, 'submenu'=>[]),
            array('nombre'=>'Contact','activeSubmenu'=>0, 'submenu'=>[]),
        );

        //$ticket = new Ticket();
        //$ticket->user_id = 1;
        //$ticket->veh_id = 1;
        //$ticket->descripcion = "Prueba de ticket 2";
        //$ticket->save();

        $ticket = Ticket::all();
        return view('modulos.tickets',compact('ticket','menu'));
    }

    public function create()
    {
        $user = auth()->user();
        $menu = array(
            array('nombre'=>'Home','activeSubmenu'=>0, 'submenu'=>[]),
            array('nombre'=>'Otros','activeSubmenu'=>1, 'submenu'=>[array('nombre'=>'sub 1','activeSubmenu'=>'0', 'submenu'=>[]),array('nombre'=>'sub 2','activeSubmenu'=>'0', 'submenu'=>[])]),
            array('nombre'=>'Team','activeSubmenu'=>0, 'submenu'=>[]),
            array('nombre'=>'Contact','activeSubmenu'=>0, 'submenu'=>[]),
        );
        return view('modulos.create',compact('menu','user'));
    }

    public function show($ticket)
    {
        $menu = array(
            array('nombre'=>'Home','activeSubmenu'=>0, 'submenu'=>[]),
            array('nombre'=>'Company','activeSubmenu'=>1, 'submenu'=>[array('nombre'=>'sub 1','activeSubmenu'=>'0', 'submenu'=>[]),array('nombre'=>'sub 2','activeSubmenu'=>'0', 'submenu'=>[])]),
            array('nombre'=>'Team','activeSubmenu'=>0, 'submenu'=>[]),
            array('nombre'=>'Contact','activeSubmenu'=>0, 'submenu'=>[]),
        );
        return view('modulos.show', compact('ticket','menu'));
    }
}
