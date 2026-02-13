<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImports implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            if(isset($item['zagolovok'])){
                Post::firstOrCreate([
                    'title' => $item['zagolovok'],
                ],[
                    'title' => $item['zagolovok'],
                    'content' => $item['kontent'],
                ]);
            }
        }
    }
}
