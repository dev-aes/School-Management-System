<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;

class StudentImport implements ToModel,WithHeadingRow,WithValidation
{

    public function model(array $row)
    {
        $date = intval($row['birth_date']);
        $birth_date =  Date::excelToDateTimeObject($date)->format('Y-m-d');

        return new Student([
            "first_name" => $row["first_name"],
            "middle_name" => $row["middle_name"],
            "last_name"    => $row["last_name"],
            "birth_date"  =>  $birth_date,
            "gender"  => $row["gender"],
            "section_id"  => $row["section_id"],
            "nationality"  => $row["nationality"],
            "city"  => $row["city"],
            "province"  => $row["province"],
            "country"  => $row["country"],
            "address"  => $row["address"],
            "contact"  => $row["contact"],
            "facebook"  => $row["facebook"],
            "email"  => $row["email"],
            "student_avatar"  => $row["student_avatar"],
            "lrn" => $row["lrn"],
            "is_imported" => $row["is_imported"]
        ]);
    }

    // public function prepareForValidation($data, $index)
    // {
    //     //Fix that Excel's numeric date (counting in days since 1900-01-01)
    //     $data['birth_date'] = Date::excelToDateTimeObject($data['birth_date'])->format('Y-m-d');
    //     //...
    // }

    public function rules():array 
    {
        return [
            '*.email' => ['email', 'unique:students,email'],  // get all email check if its unique in the teachers table column email
        ];
    }
}
