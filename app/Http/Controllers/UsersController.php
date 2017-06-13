<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if( !user_can( 'users' , 'read_users') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        $perPage = 25;
        $users = User::paginate($perPage);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if( !user_can( 'users' , 'create_users') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        return view('admin.users.create',[
            'roles' => Role::all()->pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        /*if( !user_can( 'users' , 'create_users') ) {
            return app_notice( 'You do not have permission to access this page');
        }*/

        /*dd($request->toArray());*/
        $request->request->set('password', bcrypt( $request->password ));

        $user = User::create($request->all());
        $user->roles()->sync($request->roles);

        Session::flash('flash_message', 'User added!');

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        if( !user_can( 'users' , 'read_users') && !user_can( 'users' , 'read_user') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        if( !user_can( 'users' , 'edit_users') && !user_can( 'users' , 'edit_user') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        $user = User::with('roles')->findOrFail($id);

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()->pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        if( !user_can( 'users' ,'edit_users') && !user_can( 'users' , 'edit_user') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        $user = User::findOrFail($id);
        if( isset( $request->password) && !empty( $request->password ) ) {
            $request->request->set('password', bcrypt( $request->password ));
        } else {
            $request->request->set('password', $user->password); ;
        }
        

        $user->update($request->all());
        $user->roles()->sync($request->roles);

        Session::flash('flash_message', 'User updated!');

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if( !user_can( 'users' , 'delete_users') && !user_can( 'users' , 'delete_user') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('users');
    }

    function changeApproval( $user_id, $approval_code ) {
        User::whereId($user_id)->update(['is_active' => ( $approval_code == 1 ? $approval_code : null ) ]);
        return redirect()->route('users.index');
    }
}
