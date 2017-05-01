@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-comments"></i> <h3 class="box-title">Chat</h3>
                    </div>
                    <div class="box-body">

                            <chat-message></chat-message>
                            <chat-log></chat-log>
                            <chat-form></chat-form>

                    </div><!-- .box-body -->
                </div><!-- .box -->
            </div><!-- .col- -->
        </div><!-- .row -->
	</div>
@endsection
