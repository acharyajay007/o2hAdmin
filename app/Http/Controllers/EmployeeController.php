<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\Traits\CommonTrait;
use App\Company;
class EmployeeController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate("10");
        return view('employee.list',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        return view('employee.create', ['companies'=> $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
         $data = [
            "name" => $request->get("first_name")." ".$request->get("last_name"),
            "first_name" => $request->get("first_name"),
            "last_name" => $request->get("last_name"),
            "phone" => $request->get("phone"),
            "email" => $request->get("email"),
            "company_id" => $request->get("company_id"),
        ];
        $employee = Employee::create($data);
        return redirect('employees')->with('message', 'Employee Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.view',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::get();
        return view('employee.edit',['employee'=>$employee, 'companies'=> $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        
        $data = [
            "name" => $request->get("first_name")." ".$request->get("last_name"),
            "first_name" => $request->get("first_name"),
            "last_name" => $request->get("last_name"),
            "phone" => $request->get("phone"),
            "email" => $request->get("email"),
            "company_id" => $request->get("company_id"),
        ];
        $employee->update($data);
        return redirect('employees')->with('message', 'Employee Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
