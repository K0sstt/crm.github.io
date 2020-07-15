<?php

namespace App\Console\Commands;

use App\Http\Controllers\GoogleSheetsController;
use Illuminate\Console\Command;

class ImportGoogleSheets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:google-sheets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import GoogleSheets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        app()->make(GoogleSheetsController::class)->getAllRows();
        echo "import done!\n";
    }
}
