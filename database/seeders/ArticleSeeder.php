<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('articles')->insert([
                'category_id' => '2',
                'title' => 'Haha',
                'image' => 'https://media.istockphoto.com/photos/taj-mahal-mausoleum-in-agra-picture-id1146517111?s=612x612',
                'content' => 'HAHAAHAHAHHA',
                'slug' => str_slug('HEHEHE hihihi'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
