<?php

namespace Database\Factories;

use App\Models\PeriodStudent;
use App\Models\Student;
use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeriodStudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PeriodStudent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::select('id')->first()->id, //rand() in sql //->orderByRaw("RANDOM()")
            'period_id' => Period::select('id')->first()->id, //->orderByRaw("RANDOM()")
        ];
    }
}
