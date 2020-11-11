<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->texte,
            'created_at' => now(),
            'updated_at' =>now(),
            'remember_token' => Str::random(10),
        ];
    }
}
