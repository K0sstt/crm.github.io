<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * @var EmployeeService
     */
    private $service;

    /**
     * EmployeeController constructor.
     * @param EmployeeService $employeeService
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->service = $employeeService;
    }

    public function index()
    {
        $employees = $this->service->all();

        return view('employees.index', compact('employees'));
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * @param Request $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Employee $employee)
    {
        $this->service->update($employee, $request->all());

        return redirect()->route('employees.show', $employee);
    }




    public function search(Request $request)
    {
        $result = Employee::where('full_name', 'like', "%{$request->search}%")->get();

        return view('searches.search', compact('result'));
    }
}
