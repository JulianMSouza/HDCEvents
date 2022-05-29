@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div id="search-container"  class="col-md-12">
    <h1> Busque um evento</h1>
    <form action=""> 
        <input type="text" id="search" name="search" class="form-control" placeholder="procurar">
    </form>

</div>
<div id="search-container"  class="col-md-12">
    <h2> Próximos Eventos</h2>
    <p>Veja os eventos dos próximos dias </p>
    
    <div id="cards-container"  class="row"> 
    @foreach($events as $event)

        <p> {{ $event->title}}  -- {{ $event->description }}</p>


    @endforeach
    </div>
    
    

</div>

</div>


@foreach($events as $event)

<p> {{ $event->title}}  -- {{ $event->description }}</p>


@endforeach



@endsection