<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Imports\PostImports;
use App\Models\Post;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import:excel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::import(new PostImports(), public_path('excel/Posts.xlsx'));

    }
}
