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
                        <!-- Tasques
                        ================================================== -->
                        @foreach($tasks as $task)
                            <tr>
                                <td class="task-id">{{ $task->id }}</td>
                                <td title="Created at {{ $task->created_at }}" class="task-name">{{ $task->name }}</td>
                                <td class="task-action">
                                    <button type="button" title="Edit" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" title="Trash" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- .box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
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