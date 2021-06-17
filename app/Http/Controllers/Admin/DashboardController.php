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
        // $users = User::all()->count(); // count all users
        // $students = Student::all()->count(); // count all students
        // $teachers = Teacher::all()->count(); // count all teachers
        // $parents = User::where('role_id', '3')->count(); // count all parents


        // $activity_logs = Activity::where('subject_type', '!=', 'App\Models\ParentPayment')->latest()->take(5)->get(); // get the latest 5 activity logs
        // $parent_payments_log = DB::select("SELECT al.id, al.description, al.properties, al.parent_id, al.student_id, al.created_at, pp.seen FROM activity_log al INNER JOIN parent_payments pp ON al.parent_id = pp.parent_id  WHERE al.student_id = pp.student_id AND al.causer_id !=1 GROUP BY pp.id ORDER BY pp.seen LIMIT 5"); // get the latest parent payment request


        // // dd($parent_payments_log);
        // $payment_notif_count = ParentPayment::where('seen', '0')->count(); // count the parent payment request

        // $latest_users = User::with('role')->where('role_id', '!=', '1')->latest()->take(10)->get(); // get the latest users

        // $yearly_sales = DB::table('payments')->select(DB::raw("sum(amount) as total"))->first(); // get the total of yearly sale

        

        // $monthly_sales = DB::table('payment_ledger') // get all the monthly sales
        //                  ->join('payments', 'payment_id', 'payments.id')
        //                  ->select(DB::raw("sum(payments.amount) as total"), "month")
        //                  ->groupBy('month')
        //                  ->get();
        // $months = [];
        // $sales = [];

        // foreach($monthly_sales as $m)
        // {
        //      array_push($months, Carbon::parse($m->month)->format('M'));
        // }

        // foreach($monthly_sales as $s)
        // {
        //      array_push($sales, $s->total);
        // }


        // $get_total_enrollee = DB::table('student_fee')
        //                       ->join('students', 'student_id', '=' , 'students.id')
        //                       ->where('has_downpayment' , '=', 1)
        //                       ->count(); // count all total enrollee (Enroled Students)
        
        // $get_total_staff = User::where('role_id', '!=' , '2')->where('role_id', '!=' , '3')->count();


        // // get students by grade level

        // $g1 = Student::where('grade_level_id', 1)->count();
        // $g2 = Student::where('grade_level_id', 2)->count();
        // $g3 = Student::where('grade_level_id', 3)->count();
        // $g4 = Student::where('grade_level_id', 4)->count();
        // $g5 = Student::where('grade_level_id', 5)->count();
        // $g6 = Student::where('grade_level_id', 6)->count();

        // if(request()->ajax())
        // {
        //     // display only if there is a payment request from the parent
        //     if(count($parent_payments_log) > 0 )
        //     {
        //          return response()->json([$latest_users, $activity_logs, $payment_notif_count, $parent_payments_log]);
        //     }

        //     return response()->json([$latest_users, $activity_logs, $payment_notif_count]);
        // }

        return view('home');


        return view('home', compact(['users', 
                                     'students', 
                                     'teachers', 
                                     'parents', 
                                     'months', 
                                     'sales', 
                                     'yearly_sales', 
                                     'get_total_enrollee', 
                                     'get_total_staff',
                                     'g1',
                                     'g2',
                                     'g3',
                                     'g4',
                                     'g5',
                                     'g6'
                                     ]));
    }

}
