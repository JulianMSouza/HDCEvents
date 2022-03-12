<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $nome = "Julian";
        $idade = "35";
    
        $array = [10,20,30,40,50];
    
        $nomes = ["Matheus", "Maria", "Joao", "Saulo"];
    
        return view('welcome', 
                [   
                    'nome' => $nome, 
                    'idade' => $idade,
                    'array' =>$array,
                    'nomes' => $nomes
                ]);
    }

    //Action para requisição get do formulário - solicitação da página, para retornar a view disponibilizada para o usuário.
    public function create(){       
        return view('events.create');
    }

}
