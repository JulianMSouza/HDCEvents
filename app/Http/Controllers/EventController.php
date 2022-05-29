<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = "";
    
        return view('welcome', []);
    }

    //Action para requisição get do formulário - solicitação da página, para retornar a view disponibilizada para o usuário.
    public function create(){       
        return view('events.create');
    }

}
