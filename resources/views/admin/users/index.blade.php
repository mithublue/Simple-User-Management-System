@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        @if( user_can( 'users' , 'create_users') )
                        <a href="{{ url('/users/create') }}" class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Username</th><th>Name</th><th>Password</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->username }}</td><td>{{ $item->name }}</td><td> @if( isset( $item->roles ) && is_object($item->roles) && !empty( $item->roles ) && isset( $item->roles->pluck(['name'])[0] ) )   {{ $item->roles->pluck(['name'])[0]/*->toArray()[0]*/ }} @endif</td>
                                        <td>
                                            @if( user_can( 'users' , 'read_users') )
                                            <a href="{{ url('/users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @endif
                                                @if( user_can( 'users' , 'edit_users') ||  ( user_can( 'users' , 'edit_users') && Auth::user()->id == $item->id ) )
                                                <a href="{{ url('/users/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endif
                                                @if( user_can( 'users' , 'delete_users') || ( user_can( 'users' , 'delete_user') && Auth::user()->id == $item->id ) )
                                                    {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/users', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete User',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                                    @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
