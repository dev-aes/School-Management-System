<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return $this->random();

        return array('name' => 'Math', 'description' => 'Math 101', 'grade_val' => 1);
    }

    public function random()
    {
        $names = Arr::random(['Math', 'English', 'Filipino', 'Makabayan', 'Hekasi', 'Araling Panlipunan']);
        $descriptions = Arr::random(['test_description']);
        $grade_vals = Arr::random([1]);

        return array('name' => $names , 'description' => $descriptions, 'grade_val' => $grade_vals);
    }
}
