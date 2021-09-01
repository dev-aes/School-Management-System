<?php
namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        if(request()->ajax()) {
           return response()->json([School::first(), AcademicYear::all(), AcademicYear::where('status', '1')->first()]);
        }
        return view('school.index');
    }

    public function store(SchoolRequest $request)
    {
        $data = $request->validate();

        if(request()->ajax()) {
            // check if the request has an image
            if(request()->hasFile('school_logo')) {
                $data['school_logo'] = request('school_logo')->getClientOriginalName(); // get only the original file_name 
                request('school_logo')->storeAs('uploads/school', $data['school_logo'], 'public' );  // params: fileFolder , fileName , filePath

                School::create($data);
            }
        }

    
    }

    public function show(School $school) 
    {
        if(request()->ajax()) {
            return $this->res($school);
        }
    }

    public function edit(School $school) {
        if(request()->ajax()) {
            return $this->res($school);
        }
    }
 
    public function update(School $school, SchoolRequest $request) 
    {
        $data = $request->validate();


        if(request()->ajax()) {
            if(request()->hasFile('school_logo')) {
                $data['school_logo'] = request('school_logo')->getClientOriginalName(); // get only the original file_name 
                if($school->school_logo) {
                    Storage::delete("/public/uploads/school/$school->school_logo");
                }
                request('school_logo')->storeAs('uploads/school', $data['school_logo'], 'public' );  // params: fileFolder , fileName , filePath

                DB::table('grade_levels')->update(['months_no' => $data['months_no'] ]);
                $school->update($data);

              
            }
            else {

                DB::table('grade_levels')->update(['months_no' => $data['months_no'] ]);
                $school->update($data);

                return $this->success();
            }
        }   
    }

    public function destroy(School $school) 
    {
        if(request()->ajax()) {
            $school->delete();
            return $this->success();
        }
    }

   
}
