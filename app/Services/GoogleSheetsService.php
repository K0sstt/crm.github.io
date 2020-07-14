<?php

namespace App\Services;

use App\Entities\Row;
use Sheets;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Sheets;

final class GoogleSheetsService
{
    /**
     * @var string
     */
    private $sheetId;

    /**
     * @var string
     */
    private $sheetName;

    /**
     * @var Google_Service_Sheets
     */
    private $sheetsService;

    /**
     * GoogleSheetsService constructor.
     * @throws \Google_Exception
     */
    public function __construct()
    {
        $this->sheetId = config('services.google_sheets.id');
        $this->sheetName = config('services.google_sheets.name');

        $client = new \Google_Client();
        $client->setApplicationName(config('app.name'));
        $client->setScopes([Google_Service_Drive::DRIVE, Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig(storage_path('app/public/'.config('services.google_sheets.access_file')));
        $this->sheetsService = new \Google_Service_Sheets($client);
        Sheets::setService($this->sheetsService);
    }

    /**
     * @return array|null
     */
    public function getAllRows(): ?array
    {
        return Sheets::spreadsheet($this->sheetId)->sheet($this->sheetName)->all();
    }

    /**
     * @param Row $row
     * @return void
     */
    public function addRow(Row $row): void
    {
        Sheets::setService($this->sheetsService);

        Sheets::spreadsheet($this->sheetId)->sheet($this->sheetName)->append([array_values($row->toArray())]);
    }
}
