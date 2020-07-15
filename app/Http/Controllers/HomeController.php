<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $companyModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->middleware('auth');
        $this->companyModel = $company;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = $this->companyModel->all();

        return view('home', compact('companies'));
    }
}
