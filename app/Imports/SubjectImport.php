<?php

namespace App\Imports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SubjectImport implements ToModel,WithHeadingRow, WithValidation
{
    
    public function model(array $row)
    {
        return new Subject([
            'grade_val' => $row['grade_val'],
            'name' => $row['name'],
            'description' => $row['description'],
            'is_imported' => $row['is_imported']
        ]);
    }

    public function rules():array 
    {
        return [
            '*.name' => ['string', 'unique:subjects,name']  // get all name check if its unique in the subjects table column name
        ];
    }

   
}
