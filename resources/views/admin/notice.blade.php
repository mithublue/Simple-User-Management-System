@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card card-blue">
                    <div class="card-content text-center">
                        <div class="card-title">
                            <h3>Error !</h3>
                        </div>
                        <div class="panel-body">
                            {{ $notice }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop