<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fact = Factory::create();
        foreach (range(0, 5) as $index) {
            Category::create([
                'name'=>$fact->sentence(10),
            ]);
        }
        $cate = Category::all();
        foreach (range(0, 100) as $index) {
            Post::create([
                'title'=>$fact->title,
                'content'=>$fact->text,
                'photo'=>$fact->imageUrl(300,150),
                'category_id'=>$cate[rand(1,5)]->id
            ]);
        }
    }
}
