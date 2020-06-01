<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompaniesController extends Controller
{
    //
    public function index(){
        $companies=Company::all();
        return view('companies.index')->with('companies',$companies);
    }

    public function show($id){
        $company = Company::find($id);
        $jobs = $company->jobs;
        return view('companies.show')->with(['company'=>$company,'jobs'=>$jobs]);
    }
}
