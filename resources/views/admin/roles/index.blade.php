@extends('layouts.app')

@section('content')

            @include('admin.sidebar')

            <br/>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Roles</div>
                    <div class="panel-body">
                        @if( user_can( 'roles' , 'create_roles') )
                        <a href="{{ url('/roles/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Role">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if( user_can( 'roles' , 'read_roles') )
                                            <a href="{{ url('/roles/' . $item->id) }}" title="View Role"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @endif
                                                @if( user_can( 'roles' , 'edit_roles') )
                                                <a href="{{ url('/roles/' . $item->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endif
                                                @if( user_can( 'roles' , 'delete_roles') )
                                                    {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/roles', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Role',
                                                        'onclick'=>'return confirm("Do you want to delete this role ?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                                    @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $roles->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection
