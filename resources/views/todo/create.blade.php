@extends('layouts.template')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" action="{{ route('todo.store') }} " enctype="multipart/form-data">
@csrf  
Titolo:<br>
<input type="text" name="titolo" class="form-control">   
Testo:<br>
<textarea name="testo" class="form-control" id="mytextarea"></textarea> 
<br> 
Inizio:<br>
<input type="date" name="inizio" class="form-control">
<br> 
Fine:<br>
<input type="date" name="fine" class="form-control">
<br> 
Priorita':<br>
<select name="priorita" class="form-select" id="priorita">
    <option value="alta">alta</option>
    <option value="medio">medio</option>
    <option value="bassa ">bassa </option>
  </select>
<br> 
<input type="submit" value="Salva Post" class="btn btn-primary" />

</form>



@endsection 