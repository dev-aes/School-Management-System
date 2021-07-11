<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

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
        $names = Arr::random(['Bayabas', 'Ubas', 'Apple', 'Santol', 'Durian', 'Langka']);
        $descriptions = Arr::random(['test_description']);
        $grade_level_ids = Arr::random([1]);

        return array('name' => $names , 'description' => $descriptions, 'grade_level_id' => $grade_level_ids);
    }
}
