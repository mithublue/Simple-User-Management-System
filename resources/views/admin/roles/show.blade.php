@extends('layouts.app')

@section('content')

            @include('admin.sidebar')
<br/>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Role {{ $role->id }}</div>
                    <div class="panel-body">


                        <a href="{{ url('/roles/' . $role->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-xs pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/roles', $role->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs pull-right',
                                    'title' => 'Delete Role',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <a href="{{ url('/roles') }}" title="Back"><button class="btn btn-warning btn-xs pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $role->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $role->name }} </td></tr>
                                    <tr>
                                        <th> Capabilities </th>
                                        <td>
                                        @foreach($capabilities->doctors as $key => $capability)
                                        {{ $key }} <br/>
                                        @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
