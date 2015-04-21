@extends('layouts.master')

@section('title', 'Settings')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <h1>Your Settings</h1>
                <p>Edit your settings for broadcastPanel here. Any changes you make (and save) will be instantly updated and your session will continue to use the new values chosen.</p>
                {!! Form::open(['url' => '/account/settings', 'class' => 'form-horizontal drop-20']) !!}

                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7    ">
                        {!! Form::text('email', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-7    ">
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>  
@stop
