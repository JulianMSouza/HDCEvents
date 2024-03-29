<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class EventController extends Controller
{
    
    public function index() {

        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            //Chama todos eventos da tabela events no mysql
            $events = Event::all();
        }        
    
        return view('welcome',['events' => $events, 'search' => $search]);

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

        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    //Action para requisição get do formulário - solicitação da página, para retornar a view disponibilizada para o usuário.
    public function show($id){     
        
        $event = Event::findOrFail($id);
        $user = auth()->user();
        $usuarioParticipante = false;
        if ($user) {
            $user->events = $user->eventAsParticipant->toArray();
            foreach($user->events as $userEvent){
                if ($userEvent['id'] == $id){
                    $usuarioParticipante = true;
                }
            }
        }



        //acesso à entidade User e consequentemente aos dados relativos para manipular.
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 
                    'eventOwner' => $eventOwner,
                    'usuarioParticipante' => $usuarioParticipante]);
        
    }

    public function dashboard(){
        $user = auth()->user();
        //Mapeamento de eventos por usuário já existe na model Models\User.
        $events = $user->events;

        

        //Chamada da action/método eventAsParticipant da model user que já contém os dados.
        $eventAsParticipants = $user->eventAsParticipant;

        
        

        return view('events.dashboard', ['events' => $events,
                     'eventsasparticipants' => $eventAsParticipants
        ]);

    }

    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id){

        $user = auth()->user();

        $event = Event::findOrFail($id);

        //Só permite abrir edicao de evento se for o proprietario do evento.
        if ($user->id = $event->user_id){            
            return redirect('/dashboard')->with('msg', 'Evento não pode ser alterado!');
        }
        else{
            return view('events.edit', ['event' => $event]);
        }
        

    }

    public function update(Request $request){

        $data = $request->all();
         // Image Upload
         if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            //Cria uma hash única concatenando o nome do arquivo e a data/hora do upload.
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);
            $data['image'] = $imageName;
        }

        //$request->all() ->Para atualizar todos os dados recebidos.
        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento atualizado com sucesso!');

    }

    public function joinEvent($id){
        $user = auth()->user();
        //attach faz a ligacao entre usuário e evento.
        $user->eventAsParticipant()->attach($id);

        $event = Event::findOrFail($id);



        return redirect('/dashboard')->with('msg', 'Sua presença foi confirmada no evento ' . $event->title );
    }

    public function leaveEvent($id){
        $user = auth()->user();
        
        //detach remove a ligacao entre usuário e evento.
        $user->eventAsParticipant()->detach($id);

        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Você saiu cum sucesso do evento ' . $event->title );
    }

}