<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school_name' => $this->faker->name,
            'deped_no' => $this->faker->name,
            'city' => $this->faker->city,
            'province' => $this->faker->city,
            'address' => $this->faker->address,
            'contact' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'facebook' => $this->faker->url,
            'school_logo' => 'HOLY_CROSS.png',
            'months_no' => 10,
            'date_started' => '2021-06-21',
            'country' => 'Philippines'
        ];
    }
}
