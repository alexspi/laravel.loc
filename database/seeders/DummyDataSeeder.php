<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->count(10)
            ->create();
        Tag::factory()
            ->count(10)
            ->create();
        Post::factory()
            ->count(25)
            ->create();
        Comment::factory()
            ->count(40)
            ->create();


        $data = [];
        for ($i = 0; $i < 60; $i++) {
            $data[] = [
                'post_id' => rand(1, 25),
                'tag_id' => rand(1, 10),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];
        }

        DB::table('post_tag')->insert($data);
    }
}
