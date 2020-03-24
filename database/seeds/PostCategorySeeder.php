<?php

use Illuminate\Database\Seeder;
use App\PostCategory;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
       $post_category =  PostCategory::create([
        'description' => "Hábitos de salud",
       ]);
       $post_category =  PostCategory::create([
        'description' => "Estilo de vida",
       ]);
       $post_category =  PostCategory::create([
        'description' => "Noticias de interés",
       ]);
    }
}
