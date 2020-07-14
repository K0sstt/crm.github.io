<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Employee;

final class EmployeeService
{
    /**
     * @var Employee
     */
    private $model;

    /**
     * EmployeeService constructor.
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    /**
     * @param array $employee
     * @return Company|null
     */
    public function store(array $employee): ?Employee
    {
        if ($this->model->where('full_name', $employee['full_name'])->doesntExist()) {
            return $this->model->create($employee);
        } else {
            return null;
        }
    }
}
