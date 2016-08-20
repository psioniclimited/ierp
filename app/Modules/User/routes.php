<?php

/*
  |--------------------------------------------------------------------------
  | User Routes
  |--------------------------------------------------------------------------
  |
  | All the routes for User module has been written here
  |
  |
 */
Route::group(['middleware' => ['web']], function () {
    
    //routes here
    Route::get('/', function () {
        return view('User::login');
    });

    //Login Module
    Route::get('login', 'App\Modules\User\Controllers\IndexController@index');
    Route::post('user_login', 'App\Modules\User\Controllers\IndexController@loginUser');

    Route::get('logout', 'App\Modules\User\Controllers\IndexController@logoutUser');

    //User Module
    Route::get('allusers', 'App\Modules\User\Controllers\IndexController@allUsers');
    Route::get('getusers', 'App\Modules\User\Controllers\IndexController@getUsers');
    Route::get('create_users', 'App\Modules\User\Controllers\IndexController@createUsers');
    Route::post('create_users_process', 'App\Modules\User\Controllers\IndexController@createUsersProcess');


    //User Settings
    Route::get('roles', 'App\Modules\User\Controllers\UserSettingsController@allRoles');
    Route::get('getroles', 'App\Modules\User\Controllers\UserSettingsController@getRoles');
    Route::post('role_add_process', 'App\Modules\User\Controllers\UserSettingsController@addRolesProcess');
    
    Route::get('permissions', 'App\Modules\User\Controllers\UserSettingsController@allPermissions');
    Route::get('getpermissions', 'App\Modules\User\Controllers\UserSettingsController@getPermissions');
    Route::post('permission_add_process', 'App\Modules\User\Controllers\UserSettingsController@addPermissionsProcess');
});

