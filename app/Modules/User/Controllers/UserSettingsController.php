<?php
namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;

class UserSettingsController extends Controller{
    
    public function allRoles(){
        return view('User::roles');
    }
}
