<?php

namespace Database\Factories;

use App\Models\GradeLevel;
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

        return [
          'name' => 'grade 1',
          'grade_val' => 1,
          'description' => 'g1',
          'months_no' => '10',
          'academic_year_id'=> '1'
        ];
 
    }
}
