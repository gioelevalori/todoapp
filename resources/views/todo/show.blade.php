@extends('layouts.template')

@section('content')
<br>
<h1>{{ $todo->titolo }}</h1> <br>
<h4>{!! $todo->testo !!}</h4>
<h4>Inizio: {!! $todo->inizio !!}</h4>
<h4>Fine: {!! $todo->fine !!}</h4>
<h4>Priorità: {!! $todo->priorita !!}</h4>


    
  

@endsection