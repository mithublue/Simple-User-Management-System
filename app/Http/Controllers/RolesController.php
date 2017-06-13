<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Session;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if( !user_can( 'roles' , 'read_roles') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        $perPage = 25;
        $roles = Role::paginate($perPage);

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if( !user_can( 'roles' , 'create_roles') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        global $arko_caps;

        return view('admin.roles.create',[
            'caps' => $arko_caps
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
        if( !user_can( 'roles' , 'create_roles') ) {
            return app_notice( 'You do not have permission to access this page');
        }
        
        $requestData = $request->all();

        Role::create([
            'name' => $request->name,
            'caps' => json_encode($request->caps)
        ]);

        Session::flash('flash_message', 'Role added!');

        return redirect('roles');
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
        if( !user_can( 'roles', 'read_roles') && !user_can( 'roles', 'read_role') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        $role = Role::findOrFail($id);

        $capabilities = $role->caps ? json_decode($role->caps):array();

        return view('admin.roles.show', compact('role','capabilities'));
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
        if( !user_can( 'roles', 'edit_roles') && !user_can( 'roles', 'edit_role') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        global $arko_caps;

        $role = Role::findOrFail($id);

        if( $role->caps == null ) {
            $role->caps = '{}';
        }
        return view('admin.roles.edit', [
            'role' => $role,
            'caps' => $arko_caps,
            'sel_caps' => json_decode($role->caps,true)
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
        if( !user_can( 'roles', 'edit_roles') && !user_can( 'roles', 'edit_role') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        
        $requestData = $request->all();
        
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'caps' => json_encode($request->caps)
        ]);

        /**
         * set change flag to cache
         * so that users with this role
         * can reset the session
         */
        $changed_role_caps = Cache::get('changed_role_caps');
        is_array( $changed_role_caps  ) ? '' : $changed_role_caps  = array();

        $changed_role_caps[$id] = array(
            'time' => strtotime(date('d-m-y'))
        );

        Cache::forever( 'changed_role_caps', $changed_role_caps );

        Session::flash('flash_message', 'Role updated!');

        return redirect('roles');
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
        if( !user_can( 'roles' , 'delete_roles') && !user_can( 'roles' , 'delete_role') ) {
            return app_notice( 'You do not have permission to access this page');
        }

        Role::destroy($id);

        Session::flash('flash_message', 'Role deleted!');

        return redirect('roles');
    }
}
