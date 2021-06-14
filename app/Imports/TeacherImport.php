<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TeacherImport implements ToModel,WithHeadingRow,WithValidation
{
    
    public function model(array $row)
    {
        return new Teacher([
            "grade_level_id"  => $row["grade_level_id"],
            "first_name" => $row["first_name"],
            "middle_name" => $row["middle_name"],
            "last_name"    => $row["last_name"],
            "birth_date"  => $row["birth_date"],
            "gender"  => $row["gender"],
            "city"  => $row["city"],
            "province"  => $row["province"],
            "country"  => $row["country"],
            "address"  => $row["address"],
            "contact"  => $row["contact"],
            "facebook"  => $row["facebook"],
            "email"  => $row["email"],
            "teacher_avatar"  => $row["teacher_avatar"]
        ]);
    }

    public function rules():array 
    {
        return [
            '*.email' => ['email', 'unique:teachers,email']  // get all email check if its unique in the teachers table column email
        ];
    }
}
