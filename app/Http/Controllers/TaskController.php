<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //On task.index fa referència a la carpeta tasks i fitxer index.blade.php de resources/views/
        return view('tasks.index');
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
            'name' => 'required|min:5|max:255',
        ]);

        //CREAR
        //Tenim en compte les relacions Eloquent entre usuaris i tasques (hasMany).
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        //RETURN
        Task::create($request->all());

        return response([
            'error'   => false,
            'created' => true,
            'message' => 'Task created!',
        ], 200);

        //XIVATOS
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
