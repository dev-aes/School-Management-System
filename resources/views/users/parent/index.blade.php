@extends('users.layouts.userdashboard')

@section('avatar')
<span class="align-middle"><img src="{{ asset('images/user_img.png') }}" alt="parent_avatar" width="130"></span>
@endsection

@section('content')

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="text-muted"><strong>My </strong> Dashboard</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Parent</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
       <div class="col-md-12">
           <div class="card w-100">
               <div class="card-header">
                   <div class="card-body bg-info">
                        <h3 class="text-white">Complete Credentials (6/1/2021)</h3>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                   <h4 class="text-muted">My Students</h4>
                </div>
                 <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-hover" id="parent_student_DT">
                            <thead>
                                <tr class="bg-secondary text-white">
                                    <th>Name</th>
                                    <th>Section</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($get_parent_students_with_section as $student )
                               @php 
                                $student_id = $student->id;
                                $parent_id = auth()->user()->parent_id;
                               @endphp
                                   <tr>
                                       <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                       <td > {{ $student->section->name }}</td>

                                            @php 
                                                    $check_if_student_has_down_payment = DB::table('student_fee')
                                                                                        ->where('student_id', $student->id)
                                                                                        ->where('has_downpayment', 1)
                                                                                        ->first() 
                                            @endphp

                                     {{--Check if the student has a downpayment if it does then check if its active or already fully paid--}}
                                      @if ($check_if_student_has_down_payment)

                                            @if ($check_if_student_has_down_payment->status == 'active')

                                                <td><span class="badge bg-success"> Active </span> </td>
                                            @else

                                                <td><span class="badge bg-primary"> Paid </span> </td>

                                            @endif
                                            
                                      @else

                                        <td><span class="badge bg-warning"> Inactive </span> </td>

                                      @endif

                                     
                                       <td>
                                           <a href="javascript:void(0)" class="btn btn-sm btn-secondary" onclick="parent_show_payment_ledger({{$student->id}})"><i class="fas fa-eye"></i></a> |
                                        
                                            @if($check_if_student_has_down_payment)

                                            {{--Check if the student is fully paid ; if it does then disable the add payment button--}}
                                            
                                                @if($check_if_student_has_down_payment->status === 'paid')
                                                @else
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary" onclick="parent_create_payment_to_student({{$student->id}})">Add Payment </a> |
                                                @endif
                                            
                                            @else
                                                    @php
                                                        $is_enroled =  DB::table('student_fee')->where('student_id', $student->id)->first();
                                                    @endphp

                                                    @if($is_enroled)
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary" onclick="parent_create_down_payment_to_student({{$student->id}})">+ Down Payment </a> |
                                                    @else
                                                    @endif
                                                  
                                                
                                            @endif

                                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary" onclick="parent_show_payment_history({{$student_id}}, {{$parent_id}})">
                                               History <i class="fas fa-history"></i>
                                            </a> |

                                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary" onclick="parent_show_student_grade({{$student_id}})">Grades</a>
                                        </td>
                                   </tr>
                               @empty
                                   <tr>
                                       <td>No data found ..</td>
                                   </tr>
                               @endforelse
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
    </div>

     <div class="row" id="parent_show_payment_history">
         {{--Display Parent Payment History--}}
     </div>

</div>
@endsection