<?php

namespace Database\Factories;

use App\Models\GradeLevel;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GradeLevel::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return $this->random();
 
    }

    public function random()
    {
        $grade_levels = Arr::random(['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6']);
        $descriptions = Arr::random(['test_description']);
        $grade_vals = Arr::random([1]);
        $months_no = '10';
        $academic_year_id = '1';

        return array(
                      'name' => $grade_levels,
                      'description' => $descriptions,
                      'grade_val' => $grade_vals,
                      'months_no' => $months_no,
                      'academic_year_id' => $academic_year_id);
    }
}
