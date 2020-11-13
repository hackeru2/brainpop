<?php

namespace Database\Factories;

use App\Models\Period;
use App\Models\Teacher;
use App\Models\PeriodStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeriodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Period::class;

    /**
     * Define the model's default state.
     *
     * @return arraysubl
     */
    public function definition()
    {
            
        return [
            'name' => $this->faker->word,
        'teacher_id' => Teacher::factory(),//$this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
