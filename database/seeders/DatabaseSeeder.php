<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AcademicYear::factory(1)->create();
        \App\Models\Role::factory(1)->create();
        \App\Models\User::factory(1)->create();
        \App\Models\School::factory(1)->create();
        \App\Models\GradeLevel::factory(6)->create();
        \App\Models\Section::factory(6)->create();
        \App\Models\Subject::factory(6)->create();


    }
}
