<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use function redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Obtenir totes les tasques de la DB, tenint en compte l'usuari al qual li pertanyen.
        //Fem una consulta a la base de dades.
        $userTasks = Task::where('user_id', $request->user()->id)->get();

        //On task.index fa referència a la carpeta tasks i fitxer index.blade.php de resources/views/
        return view('tasks.index', [
            'tasks' => $userTasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDACIONS
        //El camp "name" només podrà contenir un mínim de 5 caràcters i un màxim de 255 caràcters.
        $this->validate($request, [
            'name' => 'bail|required|min:5|max:255',
        ]);

        //CREAR
        //Tenim en compte les relacions Eloquent entre usuaris i tasques (hasMany).
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        //RETURN
        return redirect()->route('tasks.index');

        //XIVATO
        //Saber quin usuari està duent a terme la petició.
        //return $request->user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
