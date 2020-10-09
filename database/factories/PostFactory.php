<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desc' => $this->faker->text(10),
            'content' => $this->faker->text(200),
            'image_url' => $this->faker->imageUrl,
            'student_id' => $this->faker->numberBetween(1, 10),
            'status' => 1,
        ];
    }
}
