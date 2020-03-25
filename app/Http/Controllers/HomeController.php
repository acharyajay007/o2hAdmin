<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalCompanies = Company::count();
        $totalEmployees = Employee::count();
        return view('home',['totalCompanies'=>$totalCompanies, 'totalEmployees'=>$totalEmployees]);
    }
}
