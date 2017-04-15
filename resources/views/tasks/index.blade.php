@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Tasks
@endsection

@section('contentheader_title')
    Tasks
@endsection

@section('contentheader_description')
    Pràctica del todosBackend.
@endsection

@section('main-content')
    <div class="container-fluid">
        <!-- Accions exitoses
             ================================================== -->
        @if (Session::has('success'))
            <div class="alert alert-success">
                <h4><i class="fa fa-check-circle"></i> Success:</h4>
                <li>{{ Session::get('success') }}</li>
            </div>
        @endif

        <!-- Tractament d'errors
             https://laravel.com/docs/5.4/validation#form-request-validation
             ================================================== -->
        @if (count($errors) > 0)
            <div class="row">
                <div class="alert alert-danger">
                    <h4><i class="fa fa-warning"></i> Error:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-plus"></i> <h3 class="box-title">Add tasks</h3>
                </div>
                <div class="box-body">
                    <!-- Formulari: crear tasques
                    ================================================== -->
                    <form action="{{ route('tasks.store') }}" method='POST'>
                        {{-- srf_field() = <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                        {{ csrf_field() }}

                        <div class="input-group">
                            <!-- Input: name
                            ================================================== -->
                            <input type="text" name="name" placeholder="Task name" class="form-control">
                            <!-- Botó: submit
                            ================================================== -->
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-info btn-flat">Add task</button>
                            </span>
                        </div>
                    </form>
                </div><!-- .box-body -->
            </div><!-- .box -->
        </div><!-- .row -->

        <div class="row">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-list"></i> <h3 class="box-title">All tasks</h3>
                </div>
                <div class="box-body">
                    <!-- Taula: organitzar tasques
                    ================================================== -->
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th class="task-id">#</th>
                            <th class="task-name">Tasks</th>
                            <th class="task-action">Actions</th>
                        </tr>
                        <!-- Tasca
                        ================================================== -->
                        @foreach($tasks as $index => $task)
                            <tr>
                                <td class="task-id">{{ $index+1 }}</td>
                                <td title="Created at {{ $task->created_at }}" class="task-name">{{ $task->name }}</td>
                                <td class="task-action">
                                    <!-- Editar tasca
                                    ================================================== -->
                                    <a href="{{ route('tasks.edit', [$task->id]) }}" title="Edit" class="btn btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <!-- Esborrar tasca
                                    ================================================== -->
                                    <form action="{{ route('tasks.destroy', [$task->id]) }}" method='POST' style="display: inline;">
                                        {{ csrf_field() }}
                                        {{-- El formulari és de tipus POST, encara que aquest està responent a una
                                        sol·licitud de tipus emprant una ruta. Els formularis d'HTML només admeten
                                        les peticions POST i GET, per la qual cosa hem de fer servir el mètode
                                        method_field('DELETE') per tal de poder colar una peticío Delete. Aquest
                                        mètode generarà un camp ocult que sobreescriurà el verdader:
                                        <input type="hidden" name="_method" value="DELETE"> --}}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" title="Delete" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- .box-body -->
                <div class="box-footer clearfix text-right">
                    {{ $tasks->links() }}
                </div><!-- .box-footer -->
            </div><!-- .box -->
        </div><!-- .row -->
    </div><!-- .container -->

    <style>
        .task-id {
            text-align: center;
        }
        th.task-id {
            width: 20px;
        }
        th.task-action {
            width: 96px;
            text-align: center;
        }
    </style>
@endsection