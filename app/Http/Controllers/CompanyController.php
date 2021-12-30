<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use GuzzleHttp\Psr7\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('company/companies', compact('companies'));
    }

    public function create()
    {
        //
        return view('company/company-form');
    }

    public function store(StoreCompanyRequest $request)
    {
        $request->validate([
            "company_name" => 'required|string|unique:companies,name',
            "company_location" => 'required:string',
            "company_contact" => 'required|numeric|unique:companies,contact',
        ]);

        $company = new Company();

        $company->name = $request->company_name;
        $company->location = $request->company_location;
        $company->contact = $request->company_contact;

        $company->save();
        $request->session()->flash("success", "Company Created Successfully");

        return redirect()->to("companies");
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('company/company-info', compact('company'));
    }
}
