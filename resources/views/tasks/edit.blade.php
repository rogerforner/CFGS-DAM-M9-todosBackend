@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit task &laquo;{{ $taskToEdit->name }}&raquo;
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
                    <i class="fa fa-pencil"></i> <h3 class="box-title">Edit task</h3>
                </div>
                <div class="box-body">
                    <!-- Formulari: editar tasques
                    ================================================== -->
                    <form action="{{ route('tasks.update', [$taskToEdit->id]) }}" method='POST'>
                        {{ csrf_field() }}
                        {{-- El formulari és de tipus POST, encara que aquest està responent a una
                        sol·licitud de tipus emprant una ruta. Els formularis d'HTML només admeten
                        les peticions POST i GET, per la qual cosa hem de fer servir el mètode
                        method_field('PUT') per tal de poder colar una peticío Put. Aquest
                        mètode generarà un camp ocult que sobreescriurà el verdader:
                        <input type="hidden" name="_method" value="PUT"> --}}
                        {{ method_field('PUT') }}

                        <div class="input-group">
                            <!-- Input: name
                            ================================================== -->
                            <input type="text" name="name" placeholder="{{ $taskToEdit->name }}" class="form-control"
                            value="{{ $taskToEdit->name }}">
                            <!-- Botó: submit
                            ================================================== -->
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-info btn-flat">Update task</button>
                            </span>
                        </div>
                    </form>
                </div><!-- .box-body -->
            </div><!-- .box -->
        </div><!-- .row -->

        <div class="row">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Info.</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <h4>&laquo;<em>{{ $taskToEdit->name }}</em>&raquo;</h4>
                    <p><strong>Created at</strong>: {{ $taskToEdit->created_at }}</p>
                    <p><strong>Updated at</strong>: {{ $taskToEdit->updated_at }}</p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- .row -->

    </div><!-- .container -->
@endsection