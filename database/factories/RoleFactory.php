<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return $this->random();

        return [
            'name' => 'admin'
        ];
        
    }

    // public function random()
    // {
    //     $roles = Arr::random(['admin', 'parent', 'student', 'teacher', 'cashier', 'registrar']);

    //     return array('roles' => $roles );
    // }
}
