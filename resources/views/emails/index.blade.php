@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Email
@endsection

@section('contentheader_title')
    Email
@endsection

@section('contentheader_description')
    Pràctica d'enviament de emails.
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-envelope-o"></i> <h3 class="box-title">Send email</h3>
                </div>
                <div class="box-body">
                    <!-- Info
                    ================================================== -->
                    <p><em>Send an email for your user email account.</em></p>
                    <!-- Formulari: enviar email
                    ================================================== -->
                    <form action="#" method='POST'>
                        <div class="input-group" style="width: 100%">
                            <!-- Botó: submit
                            ================================================== -->
                            <button type="submit" class="btn btn-info btn-block btn-flat"><strong>Send</strong></button>
                        </div>
                    </form>
                </div><!-- .box-body -->
            </div><!-- .box -->
        </div><!-- .row -->

    </div><!-- .container -->
@endsection