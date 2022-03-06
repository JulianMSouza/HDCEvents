@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')


        <h1>Algum texto</h1>

    <img src="/img/bannerfesta.jpg"  alt="Banner"

            @if(10 > 5)
            <p>A condicao é true </p>
            @endif

            <p> {{ $nome }}  </p>
           
            
            <p>"O nome é {{$nome}} e idade é {{$idade}} </p> 

            @if($nome == "pedro")
            <p> É pedro</p>
            @else
            <p> É Matheus</p>
            @endif
            
            
            @for($i = 0; $i < count($array); $i++)
                <p>{{$array[$i]}} - {{$i}}</p>

            @endfor

            @foreach($nomes as $nome)
            <p>{{$loop->index}}</p>
            <p>{{$nome}}</p>

            @endforeach

            @php
            $name = "joão";
            echo $name;
            @endphp

            <!-- Comentario que aparece na view, se inspecionar os elementos  -->
            {{-- Comentario que não aparece na view.forma correta de utilizar --}}



@endsection