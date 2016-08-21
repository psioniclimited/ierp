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
    Route::get('companydata', 'App\Modules\Company\Controllers\CompanyController@companyData');
    Route::post('create_company_process', 'App\Modules\Company\Controllers\CompanyController@createCompanyProcess');
    
    Route::get('branches', 'App\Modules\Company\Controllers\CompanyController@getBranches');
    Route::get('brancheslist', 'App\Modules\Company\Controllers\CompanyController@branchesData');
    Route::post('create_branch_process', 'App\Modules\Company\Controllers\CompanyController@createBranchProcess');    
});

