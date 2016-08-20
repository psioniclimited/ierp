<?php

/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
|
| All the routes for Company module has been written here
|
|
*/
Route::group(['middleware' => ['web']], function () {   
    Route::get('companyi', function(){
        return view('Company::company');
    });
    
    Route::get('companyinfo', 'App\Modules\Company\Controllers\CompanyController@getCompany');
    Route::get('branches', 'App\Modules\Company\Controllers\CompanyController@getBranches');
    
});

