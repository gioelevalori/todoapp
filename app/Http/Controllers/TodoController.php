<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TodoMail;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $todos = Todo::where('user_id',Auth::user()->id)
                    ->orderBy('titolo')
                    ->paginate(15);


    return view('todo.index',compact('todos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'titolo' => 'required|max:255',
            'testo' => 'required',
            'inizio' => 'required',
            'fine' => 'required',
            'priorita' => 'required',
            

        ]);
    $todo = new Todo;
    $todo->titolo = $request->titolo;
    $todo->testo = $request->testo;
    $todo->inizio = $request->inizio;
    $todo->fine = $request->fine;
    $todo->priorita = $request->priorita;
    $todo->user_id = Auth::user()->id;

    $todo->save();

   /* INVIO EMAIL */

    Mail::to(Auth::user()->email)->send(new TodoMail($todo)); 

    return redirect('/todo');


 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   $todo = Todo::find($id);
   return view('todo.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $todo = Todo::find($id);

    return view('todo.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $todo = Todo::find($id);
    $todo->titolo = $request->titolo;
    $todo->testo = $request->testo;
    $todo->inizio = $request->inizio;
    $todo->fine = $request->fine;
    $todo->priorita = $request->priorita;


    $todo->save();
    return redirect('/todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $todo = Todo::find($id);
    $todo->delete();
    return redirect('/todo');
    }
}
