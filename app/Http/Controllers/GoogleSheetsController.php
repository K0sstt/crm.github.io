<?php

namespace App\Http\Controllers;

use App\Entities\Row;
use App\Services\{
    CompanyService,
    EmployeeService,
    GoogleSheetsService as Service
};
use Sheets;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Sheets;
use Illuminate\Http\Request;

class GoogleSheetsController extends Controller
{
    /**
     * @var Service
     */
    private $service;

    /**
     * @var CompanyService
     */
    private $companyService;

    private $employeeService;

    /**
     * GoogleSheetsController constructor.
     * @param CompanyService $companyService
     * @param EmployeeService $employeeService
     * @param Service $service
     */
    public function __construct(
        CompanyService $companyService,
        EmployeeService $employeeService,
        Service $service
    ) {
        $this->companyService = $companyService;
        $this->employeeService = $employeeService;
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllRows()
    {
        $rows = $this->service->getAllRows();
        $rows = array_slice($rows, 3);

        $companyModel = [];
        $employee = [];

        foreach ($rows as $row) {
            if (! empty($row[0])) {
                $rowCompany = array_slice($row, 1, 10);
                $company['name'] = $rowCompany[0];
                $company['comment'] = $rowCompany[1];
                $company['linkedin'] = $rowCompany[2];
                $company['business_area'] = $rowCompany[3];
                $company['product'] = $rowCompany[4];
                $company['amount_workers'] = $rowCompany[5];
                $company['revenue'] = $rowCompany[6];
                $company['years'] = $rowCompany[7];
                $company['country'] = $rowCompany[8];
                $company['site'] = $rowCompany[9];

                $companyModel = $this->companyService->store($company);

                $rowEmployee = array_slice($row, 11);
                $employee['full_name'] = $rowEmployee[0] . ' ' . $rowEmployee[1];
                $employee['company_id'] = $companyModel->id ?? null;
                $employee['position'] = $rowEmployee[2];
                $employee['email'] = $rowEmployee[3];
                $employee['linkedin'] = $rowEmployee[4];

                $this->employeeService->store($employee);

            } elseif (empty($row[0]) && ! empty($row[11])) {
                $rowEmployee = array_slice($row, 11);

                $employee['full_name'] = $rowEmployee[0] . ' ' . $rowEmployee[1];
                $employee['company_id'] = $companyModel->id ?? null;
                $employee['position'] = $rowEmployee[2];
                $employee['email'] = $rowEmployee[3];
                $employee['linkedin'] = $rowEmployee[4];

                $this->employeeService->store($employee);
            }
        }

        return view('layouts.app', compact('rows'));
    }

}
