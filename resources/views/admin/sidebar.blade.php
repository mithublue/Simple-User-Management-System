<div class="col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a href="{{ route('users.index') }}">User List</a></li>
        @if( user_can( 'users','create_users'))
            <li><a href="{{ route('users.create') }}">Add User</a></li>
        @endif

        <li role="presentation"><a href="{{ route('roles.index') }}">Role List</a></li>
        @if( user_can( 'roles','create_roles'))
            <li role="presentation"><a href="{{ route('roles.create') }}">Add Role</a></li>
        @endif
    </ul>
</div>