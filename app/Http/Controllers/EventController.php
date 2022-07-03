<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use Carbon\Carbon;

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
        $event->items = $request->items;
        $event->date = $request->date;
        $event->dataAtualizacao = Carbon::now('America/Sao_Paulo');

       
         // Image Upload
         if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            //Cria uma hash única concatenando o nome do arquivo e a data/hora do upload.
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }



        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    //Action para requisição get do formulário - solicitação da página, para retornar a view disponibilizada para o usuário.
    public function show($id){     
        
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }

}
