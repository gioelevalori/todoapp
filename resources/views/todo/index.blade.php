@extends('layouts.template')



@section('content')
<br>
<h1>I tuoi ToDo</h1>
<br>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Priorita'</th>
        <th>Titolo</th>
        <th colspan = "2">Azioni</th>
    </tr>
    


@foreach ($todos as $todo)
<tr>
    <td>{{ $todo->id }}</td>
    <td>{{ $todo->priorita }}</td>
    <td><a href="{{ route('todo.show',$todo->id) }}"> {{ $todo->titolo }}</a></td>
    <td><a href="/todo/{{ $todo->id }}/edit" class="btn btn-primary">Modifica</a></td>
    <td>
        <form method="post" action="{{ route('todo.destroy', $todo->id) }}">
            @method('DELETE')
            @csrf
            <input type="submit" value="Elimina" class="btn btn-primary">
        </form>
       </td>
</tr>
@endforeach
</table>

{{ $todos->links() }}



@endsection
