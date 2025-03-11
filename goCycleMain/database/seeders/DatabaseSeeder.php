<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::truncate();
//         Category::truncate();
//         Post::truncate();

//         $user = User::factory()->create([
//             'name' => 'John Doe'
//         ]);
//         Post::factory(15)->create([
//             'user_id' => $user->id
//         ]);

        $users = User::factory(5)->create([
            //'name' => 'John Doe'
        ]);

        $users->each(function ($user) {
            Post::factory(5)->create([
                'user_id' => $user->id
            ]);
        });

//         $user = User::factory()->create();
//
//         $personal = Category::create([
//             'name' => 'Personal',
//             'slug' => 'personal'
//         ]);
//
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//
//        Post::create([
//
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'title' => 'My Work Post',
//            'slug' => 'my-second-post',
//            'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
//        ]);
//
//        Post::create([
//
//            'user_id' => $user->id,
//            'category_id' => $family->id,
//            'title' => 'My Family Post',
//            'slug' => 'my-first-post',
//            'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
//        ]);
//
//        Post::create([
//
//            'user_id' => $user->id,
//            'category_id' => $personal->id,
//            'title' => 'My Personal Post',
//            'slug' => 'my-third-post',
//            'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
//        ]);









    }
}
