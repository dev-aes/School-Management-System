<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ParentModel;
use App\Models\ParentPayment;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
         $ay = get_latest_academic_year();
         $users = User::all()->count(); // count all users
         $students = Student::all()->count(); // count all students
         $teachers = Teacher::all()->count(); // count all teachers
         $parents = ParentModel::all()->count(); // count all parents
         $get_total_enrollee = DB::table('student_fee')
                                ->join('students', 'student_id', '=' , 'students.id')
                                ->where('has_downpayment' , '=', 1)
                                ->count(); // count all total enrollee (Enroled Students)
        
        $get_total_staff = User::where('role_id', '!=' , '2')->where('role_id', '!=' , '3')->count(); // count all total staffs

        
        // get students by grade level

        $g1 = $this->count_grade_levels(1);
        $g2 = $this->count_grade_levels(2);
        $g3 = $this->count_grade_levels(3);
        $g4 = $this->count_grade_levels(4);
        $g5 = $this->count_grade_levels(5);
        $g6 = $this->count_grade_levels(6);

        $yearly_sales = DB::table('payments')
                        ->join('student_fee', 'payments.student_fee_id', 'student_fee.id')
                        ->select(DB::raw("sum(amount) as total"))
                        ->where('student_fee.academic_year_id', $ay->id )
                        ->first(); // get the total of yearly sale

        $latest_users = User::with('role')->where('role_id', '!=', '1')->latest()->take(10)->get(); // get the latest users





        $activity_logs = Activity::where('subject_type', '!=', 'App\Models\ParentPayment')->latest()->take(5)->get(); // get the latest 5 activity logs
        $parent_payments_log = DB::select("SELECT al.id, al.description, al.properties, al.parent_id, al.student_id, al.created_at, pp.seen FROM activity_log al INNER JOIN parent_payments pp ON al.parent_id = pp.parent_id  WHERE al.student_id = pp.student_id AND al.causer_id !=1 GROUP BY pp.id ORDER BY pp.seen LIMIT 5"); // get the latest parent payment request


         // dd($parent_payments_log);
         $payment_notif_count = ParentPayment::where('seen', '0')->count(); // count the parent payment request


        $monthly_sales = DB::table('payment_ledger') // get all the monthly sales
                         ->join('payments', 'payment_id', 'payments.id')
                         ->select(DB::raw("sum(payments.amount) as total"), "month")
                         ->groupBy('month')
                         ->get();
        $months = [];
        $sales = [];

        foreach($monthly_sales as $m)
        {
             array_push($months, Carbon::parse($m->month)->format('M'));
        }

        foreach($monthly_sales as $s)
        {
             array_push($sales, $s->total);
        }


    
        if(request()->ajax())
        {
             //display only if there is a payment request from the parent
            if(count($parent_payments_log) > 0 )
            {
                 return response()->json([$latest_users, $activity_logs, $payment_notif_count, $parent_payments_log]);
            }

             return response()->json([$latest_users, $activity_logs, $payment_notif_count]);

        }

        return view('home', compact(['users',
                                     'students',
                                    'teachers',
                                    'parents',
                                    'get_total_enrollee',
                                    'get_total_staff',
                                    'g1',
                                    'g2',
                                    'g3',
                                    'g4',
                                    'g5',
                                    'g6',
                                    'yearly_sales',
                                    'months',
                                    'sales'
                                    ]));

    }

    public function count_grade_levels($grade_val)
    {
        $count = DB::table('students')
                    ->join('sections', 'section_id', 'sections.id')
                    ->join('grade_levels', 'sections.grade_level_id', 'grade_levels.id')
                    ->where('grade_levels.grade_val', $grade_val)
                    ->count();

                    return $count;
    }

}
