<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * @var Company
     */
    private $companyModel;

    /**
     * @var CompanyService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Company $company, CompanyService $companyService)
    {
        $this->middleware('auth');
        $this->companyModel = $company;
        $this->service = $companyService;
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

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        $this->service->update($company, $request->all());

        return redirect()->route('companies.show', $company);
    }


    public function search(Request $request)
    {
        $result = Company::where('name', 'like', "%{$request->search}%")->get();

        return view('searches.search', compact('result'));
    }
}
