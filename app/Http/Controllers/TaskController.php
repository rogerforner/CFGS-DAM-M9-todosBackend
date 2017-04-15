<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;
use function redirect;
use Session;
use function view;

class TaskController extends Controller
{
    /**
     * Instància per al repositori TaskRepository.
     *
     * @var TaskRepository
     */
    protected $tasks;
    /**
     * Constructor de TaskController.
     *
     * @param TaskRepository $tasks
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks; //$tasks fa referència al repositori (protected $tasks).
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //On task.index fa referència a la carpeta tasks i fitxer index.blade.php de resources/views/
        return view('tasks.index', [
            //$this->tasks fa referència al repositori: __construct(TaskRepository $tasks).
            //forUser() és la funció del repositori TaskRepository.php, amb la que fem la consulta a la base de dades.
            //$request->user() ho emprem per definir l'usuari, doncs, a més a més, la funció en requereix d'un.
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
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

        //MISSATGE
        Session::flash('success', 'New task has been succesfully added!');

        //RETURN
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * Quan l'usuari fa una petició a aquest mètode, ens interessa que aquest sigui redirigit a la vista
     * corresponent a l'edició de tasques /tasks/edit.blade.php
     *
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Task $task)
    {
        //POLÍTICA SEGURETAT
        $this->authorize('ownerTask', $task);

        //VISTA: Edició
        return view('tasks.edit', [
            'taskToEdit' => $task //variable que portem a la vista, per poder treballar amb la info de la tasca.
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        //POLÍTICA SEGURETAT
        $this->authorize('ownerTask', $task);

        //VALIDACIONS
        //El camp "name" només podrà contenir un mínim de 5 caràcters i un màxim de 255 caràcters.
        $this->validate($request, [
            'name' => 'bail|required|min:5|max:255',
        ]);

        //MISSATGE
        Session::flash('success', 'Task &laquo;' . $task->name . '&raquo; has been successfully updated.');

        //ACTUALITZAR
        //Actualment només toquem el 'name', però és interessant emprar all() ja que ens pot evitar l'oblid d'algún
        //camp, en el cas que n'emprem molts.
        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        //POLÍTICA SEGURETAT
        $this->authorize('ownerTask', $task);

        //ESBORRAR
        $task->delete();

        //MISSATGE
        Session::flash('success', 'Task &laquo;' . $task->name . '&raquo; has been successfully deleted.');

        return redirect()->route('tasks.index');
    }
}