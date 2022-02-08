<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function allCompany()
    {
        return view('admin.companies.company_list');
    }

    public function companyCreate()
    {
        return view('admin.companies.create_company');
    }
    
}
