<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        

       //Chama todos eventos da tabela events no mysql
        $events = Event::all();
    


        return view('welcome', ['events' => $events]);
    }

    //Action para requisição get do formulário - solicitação da página, para retornar a view disponibilizada para o usuário.
    public function create(){       
        return view('events.create');
    }

    //Action para salvar o evento do  formulário recebido via post.
    public function store(Request $request) {

        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;



        $event->save();

        return redirect('/');

    }

}
