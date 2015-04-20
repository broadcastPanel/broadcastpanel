@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="statistic-1">
                <i class="glyphicon glyphicon-inbox"></i><br />
                43 Messages
            </div>
        </div>
        <div class="col-sm-3">
            <div class="statistic-2">
                <i class="glyphicon glyphicon-user"></i><br />
                22 Listeners
            </div>
        </div>
        <div class="col-sm-3">
            <div class="statistic-3">
                <i class="glyphicon glyphicon-time"></i><br />
                20:32
            </div>
        </div>
        <div class="col-sm-3">
            <div class="statistic-4">
                <i class="glyphicon glyphicon-calendar"></i><br />
                23 Feb
            </div>
        </div>
    </div>
  
    <div class="row drop-20">
        <div class="col-md-12">
        Content here
        </div>
    </div>  
@stop
