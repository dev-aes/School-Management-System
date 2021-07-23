<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = Student::all();
        if($students->count() > 0)
        {
            return $students;
        }
        else
        {
           die('no data found. Please add some record before exporting .');
        }
    }

    public function headings(): array
    {
        return array_keys($this->collection()->first()->toArray());
    }
}
