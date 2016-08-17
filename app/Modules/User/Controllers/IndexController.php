<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use App\Modules\User\Models\User;
use Lang;
use Datatables;

/**
 * IndexController
 *
 * Controller to all the properties uith user module.
 * login, user crud, listing and more
 */

class IndexController extends Controller {

    public function index() {
        return view('User::login');
    }
    
    //Login Module
    public function loginUser(\App\Http\Requests\LoginRequest $request) {
        $userdata = array(
            'email' => $request->input('username'),
            'password' => $request->input('password')
        );
        if (Auth::attempt($userdata)) {            
            return redirect('dashboard');
        } else {
            return redirect('login')->withErrors([$request->input('username') => $this->getFailedLoginMessage()]);
        }
    }

    protected function getFailedLoginMessage() {
        return Lang::has('auth.failed') ? Lang::get('auth.failed') : 'wrong username / password';
    }

    public function logoutUser() {
        Auth::logout();
        return redirect('login');
    }

    //User Module
    public function allUsers(){
        return view('User::all_users');
    }
    public function getUsers() {
        $users = User::all();
        return Datatables::of($users)
                        ->addColumn('Link', function ($users) {
                            return '<a href="' . url('/sales') . '/' . $users->id . '/edit' . '"' . 'class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->setRowId('id')
                        ->make(true);
    }

    public function createUsers() {
        return view('User::create_users');
    }

    public function createUsersProcess(\App\Http\Requests\UserRequest $request) {

        $addUsers = new User();

        $addUsers->name = $request->input('fullname');
        $addUsers->email = $request->input('uemail');
        $addUsers->password = bcrypt($request->input('upassword'));

        $addUsers->save();

        return redirect('allusers');
    }

}
