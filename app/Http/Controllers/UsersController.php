<?php

namespace RogerFornerTodosBackend\Http\Controllers;

use RogerFornerTodosBackend\Repositories\UserRepository;
use RogerFornerTodosBackend\Transformers\UserTransformer;
use RogerFornerTodosBackend\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    protected $repository;

    /**
     * UsersController constructor.
     *
     * @param UserTransformer $transformer
     * @param UserRepository $repository
     */
    public function __construct(UserTransformer $transformer, UserRepository $repository)
    {
        parent::__construct($transformer);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->paginate(15);

        return $this->generatePaginatedResponse($users, ['propietari' => 'RogerForner']);
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
        User::create([$request->all()]);

        return response([
            'error'   => false,
            'created' => true,
            'message' => 'Created user!',
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
        $user = $this->repository->findOrFail($id);

        return $this->transformer->transform($user);
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
        User::findOrFail($id)->update($request->all(),$id);

        return response([
            'error'   => false,
            'updated' => true,
            'message' => 'User updated!',
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
        User::findOrFail($id)->delete($id);

        return response([
            'error'   => false,
            'deleted' => true,
            'message' => 'User deleted!',
        ], 200);
    }
}
