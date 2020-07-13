<?php

namespace App\Http\Controllers;

use App\Entities\Row;
use App\Services\GoogleSheetsService as Service;
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
     * SheetsService constructor.
     */
    public function __construct(
        Service $service
    ) {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllRows()
    {
        $rows = $this->service->getAllRows();
        new Row('1', '2');
        return view('layouts.app', compact('rows'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addRow(Request $request)
    {
        $row = new Row(
            $request->first,
            $request->second
        );

        $this->service->addRow($row);

        return redirect()->route('home');
    }
}
