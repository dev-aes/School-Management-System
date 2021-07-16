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
            'school_name' => 'Holy Cross Elementary School',
            'deped_no' => 'LGA03991',
            'city' => 'Davao',
            'province' => 'Davao Del Sur',
            'address' => 'Juna Subd. Matina Davao City, 8000',
            'contact' => '09659312003',
            'email' => 'school@gmail.com',
            'website' => 'school.edu.ph',
            'facebook' => 'www.facebook.com/schoolname',
            'school_logo' => 'ames.jpg',
            'months_no' => 10,
            'date_started' => '2021-06-21',
            'country' => 'Philippines'
        ];
    }
}
