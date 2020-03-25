<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use App\Traits\CommonTrait;

class CompanyController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate("10");
        return view('company.list',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        $data = [
            "name" => $request->get("name"),
            "website" => $request->get("website"),
            "email" => $request->get("email"),
        ];
        if ($request->hasFile("logo")) {
            $fileName = $this->storeImage($request->file("logo"),"public/company");
            $data['logo'] = $fileName;
        }
        $company = Company::create($data);
        return redirect('companies')->with('message', 'Company Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.view',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, Company $company)
    {
        
        $data = [
            "name" => $request->get("name"),
            "website" => $request->get("website"),
            "email" => $request->get("email"),
        ];
        if ($request->hasFile("logo")) {
            $this->deleteImage($company->logo,"public/company");
            $fileName = $this->storeImage($request->file("logo"),"public/company");
            $data['logo'] = $fileName;
        }
        $company->update($data);
        return redirect('companies')->with('message', 'Company Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('companies')->with('message', 'Company Deleted Successfully!');
    }
}
