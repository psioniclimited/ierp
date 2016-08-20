<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Models\Role;
use App\Modules\Models\Permission;
use Datatables;

class UserSettingsController extends Controller {

    //Roles
    public function allRoles() {
        return view('User::roles');
    }

    public function getRoles() {
        $roles = Role::all();
        return Datatables::of($roles)
                        ->addColumn('Link', function($roles) {
                            return '<a href="' . url('/') . '/' . $roles->id . '/edit' . '"' . 'class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->setRowId('id')
                        ->make(true);
    }

    public function addRolesProcess(\App\Http\Requests\RulesRequest $request) {
        $owner = new Role();
        $owner->name = $request->input('rname');
        $owner->display_name = $request->input('dname'); // optional
        $owner->description = $request->input('description'); // optional
        $owner->save();

        return redirect('roles');
    }

    //Permissions
    public function allPermissions() {
        return view('User::permission');
    }

    public function getPermissions() {
        $permissions = Permission::all();
        return Datatables::of($permissions)
                        ->addColumn('Link', function($permissions) {
                            return '<a href="' . url('/') . '/' . $permissions->id . '/edit' . '"' . 'class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->setRowId('id')
                        ->make(true);
    }

    public function addPermissionsProcess(\App\Http\Requests\PermissionRequest $request) {
        $owner = new Permission();
        $owner->name = $request->input('pname');
        $owner->display_name = $request->input('dname'); // optional
        $owner->description = $request->input('description'); // optional
        $owner->save();

        return redirect('permissions');
    }

}
