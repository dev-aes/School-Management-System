<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubjectExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $subjects = Subject::all();

        if($subjects->count() > 0)
        {
            return $subjects;
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
