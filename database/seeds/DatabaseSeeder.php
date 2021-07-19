<?php

use App\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class)->times(10)->create();
        factory(Post::class)->times(5)->create();
        factory(Comment::class)->times(3)->create();
    }
}
