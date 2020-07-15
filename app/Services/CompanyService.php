<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Employee;

final class CompanyService
{
    /**
     * @var Company
     */
    private $model;

    /**
     * CompanyService constructor.
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    /**
     * @param array $company
     * @return Employee|null
     */
    public function store(array $company): ?Company
    {
        if ($this->model->where('name', $company['name'])->doesntExist()) {
            return $this->model->create($company);
        } else {
            return null;
        }
    }

    /**
     * @param Company $company
     * @param array $data
     * @return Company
     */
    public function update(Company $company, array $data): Company
    {
        $company->update($data);

        return $company;
    }
}
