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
                            <input type="text" name="name" class="form-control">
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
                    <!-- Taula: llistar les tasques
                    ================================================== -->
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th class="task-id">#</th>
                            <th class="task-name">Tasks</th>
                            <th class="task-action">Actions</th>
                        </tr>
                        <tr>
                            <td class="task-id">1</td>
                            <td class="task-name">A long time ago in a galaxy far, far away...</td>
                            <td class="task-action">
                                <button type="button" title="Edit" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" title="Trash" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
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

    <script>

    </script>
@endsection