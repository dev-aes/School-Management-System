<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeacherExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $teachers = Teacher::all();

        if($teachers->count() > 0)
        {
            return $teachers;
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
