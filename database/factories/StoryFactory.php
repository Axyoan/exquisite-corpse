<?php

namespace Database\Factories;

use App\Models\Story;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->paragraphs(rand(3, 20), true),
            'score' => rand(-500, 1000),
            'isFinished' => rand(0, 1) == 1,
        ];
    }
}
