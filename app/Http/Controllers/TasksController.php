<?php

namespace RogerForner\TodosBackend\Http\Controllers;

use RogerForner\TodosBackend\Repositories\TaskRepository;
use RogerForner\TodosBackend\Task;
use RogerForner\TodosBackend\Transformers\TaskTransformer;
use Auth;
use Gate;
use Illuminate\Http\Request;

/**
 * Class TasksController
 *
 * @package RogerForner\TodosBackend\Http\Controllers
 */
class TasksController extends Controller
{
    /**
     * Repository object
     *
     * @var TaskRepository
     */
    protected $repository;

    /**
     * TasksController constructor.
     *
     * @param TaskTransformer $transformer
     * @param TaskRepository $repository
     */
    public function __construct(TaskTransformer $transformer, TaskRepository $repository)
    {
        parent::__construct($transformer);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $user = Auth::user();
//        if ($user->can('show', \RogerForner\TodosBackend\Task::class)) {
//            //
//        }

        //$this->authorize('show-task', \RogerForner\TodosBackend\Task::class);

        // The current user can update the post...
        $tasks = Task::paginate(15);
        return $this->generatePaginatedResponse($tasks, ['propietari' => 'RogerForner']);
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has('user_id')) {
            $request->merge(['user_id' => Auth::id() ]);
        }
        Task::create($request->all());

        return response([
            'error'   => false,
            'created' => true,
            'message' => 'Task created!',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $task = Task::findOrFail($id);
        $task = $this->repository->find($id);
        return $this->transformer->transform($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id)->update($request->all());

        //$this->authorize('update', $task);

        return response([
            'error'   => false,
            'updated' => true,
            'message' => 'Task updated!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return response([
            'error'   => false,
            'deleted' => true,
            'message' => 'Task deleted!',
        ], 200);
    }
}
