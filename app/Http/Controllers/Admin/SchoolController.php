<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SchoolController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        if(request()->ajax()) {
           return response()->json([School::latest()->take(1)->first(), AcademicYear::all(), AcademicYear::where('status', '1')->first()]);
        }
        return view('school.index');
    }

    public function store()
    {
        $data = request()->validate([
            'school_name' => 'required|alpha_spaces',
            'depEd_no' => 'required|string',
            'city' => 'required|alpha',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|int',
            'email' => 'required|email',
            'facebook'=> 'required|string',
            'website'=>'required|string',
            'school_logo'=>'image'
        ]);


        if(request()->ajax()) {
            // check if the request has an image
            if(request()->hasFile('school_logo')) {
                $data['school_logo'] = request('school_logo')->getClientOriginalName(); // get only the original file_name 
                request('school_logo')->storeAs('uploads/school', $data['school_logo'], 'public' );  // params: fileFolder , fileName , filePath
                School::create($data);

                return;
            }
           //return response()->json(School::create($data));
        }

    
    }

    public function show(School $school) 
    {
        if(request()->ajax()) {
            return response()->json($school);
        }
    }

    public function edit(School $school) {
        if(request()->ajax()) {
            return response()->json($school);
        }
    }

    public function update(School $school) 
    {
        $data = request()->validate([
            'months_no' => 'required|integer|max:12',
            'date_started' => 'required',
            'school_name' => 'required|alpha_spaces',
            'depEd_no' => 'required|string',
            'city' => 'required|alpha',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11',
            'email' => 'required|email',
            'facebook'=> 'required|string',
            'website'=>'required|string',
            'school_logo'=>'image'
        ]);


        if(request()->ajax()) {
            if(request()->hasFile('school_logo')) {
                $data['school_logo'] = request('school_logo')->getClientOriginalName(); // get only the original file_name 
                if($school->school_logo) {
                    Storage::delete("/public/uploads/school/$school->school_logo");
                }
                request('school_logo')->storeAs('uploads/school', $data['school_logo'], 'public' );  // params: fileFolder , fileName , filePath
                return response()->json($school->update($data));
            }
            else {
                return response()->json($school->update($data));
            }
        }   
    }

    public function destroy(School $school) 
    {
        if(request()->ajax()) {
            $school->delete();
        }
    }

   
}
