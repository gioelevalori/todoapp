@extends('layouts.template')

@section('content')
  
<form method="post" action="{{ route('todo.update', $todo->id) }} ">
@method('PUT')
@csrf
Titolo:<br>
<input type="text" name="titolo" class="form-control" value = " {{ $todo->titolo}}">   
Testo:<br>
<textarea name="testo" class="form-control"> {{ $todo->testo}}</textarea> 
<br> 
Inizio:<br>
<input type="text" name="inizio" class="form-control"  value = " {{ $todo->inizio}}">
<br> 
Fine:<br>
<input type="text" name="fine" class="form-control"  value = " {{ $todo->fine}}">
<br> 
Priorita':<br>
<select name="priorita" class="form-select" id="priorita"  value = " {{ $todo->priorita}}">
    <option value="alta">alta</option>
    <option value="medio">medio</option>
    <option value="bassa ">bassa </option>
  </select>
<br> 
<br> 
<input type="submit" value="Salva Post" class="btn btn-primary" />
</form>



@endsection 