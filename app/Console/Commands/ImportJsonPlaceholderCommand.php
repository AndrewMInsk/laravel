<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import:jsonplaceholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = (new ImportDataClient())->client;
        $data = (json_decode($import->request('GET', '/posts')->getBody()->getContents()));
        foreach ($data as $post) {
            Post::firstOrCreate([
                'title' => $post->title,
            ], [
                'title' => $post->title,
                'content' => $post->body,
            ]);
        }
    }
}
