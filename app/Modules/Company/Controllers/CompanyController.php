<?php

namespace App\Modules\Company\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompanyController extends Controller {
    
    public function getCompany(){
        return view('Company::company');
    }
    
    public function getBranches(){
        return view('Company::branches');
    }
}
