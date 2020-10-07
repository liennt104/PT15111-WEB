<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CategoryPost;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(10)->create();
        Subject::factory(20)->create();
        Post::factory(10)->create();
        Comment::factory(10)->create();
        Category::factory(10)->create();
        CategoryPost::factory(10)->create();
        // $this->call([
        //     StudentsTableSeeder::class,
        //     SubjectsTableSeeder::class,
        // ]);
    }
}
