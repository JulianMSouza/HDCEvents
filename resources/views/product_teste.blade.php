@extends('layouts.main')

@section('title', 'Produto teste')

@section('content')

@if($id != null)
    <p>Exibindo o produto {{ $id }}</p>
    
@endif



@endsection