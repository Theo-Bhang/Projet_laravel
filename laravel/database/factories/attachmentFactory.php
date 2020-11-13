<?php

namespace Database\Factories;

use App\Models\{Attachment, User , Task};
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            "task_id"=>Task::factory(),
            "user_id"=>User::factory(),
            'file' => base64_encode($this->faker->text),
            'filename' => "Toto.txt",
            'size'=>rand(10,1000),
            'type'=>$this->faker->mimeType(),
        ];
    }
}
