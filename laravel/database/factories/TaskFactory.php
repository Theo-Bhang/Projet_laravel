<?php

namespace Database\Factories;

use App\Models\{Task, Category, Board};
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $d = $this->faker->dateTimeBetween(now(),'+5 months');
        $date = $d->format("Y-m-d");
        return [
            "board_id"=>Board::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph(1),
            'due_date' => $date,
            'state'=>$this->faker->randomElement(['todo' ,'ongoing', 'done']),
            'category_id'=>Category::factory(),
        ];
    }
}
