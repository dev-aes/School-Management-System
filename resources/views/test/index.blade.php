@extends('layouts.admindashboard')

@section('title', 'Admin · Test')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                           <h1 class="fw-bold text-uppercase text-center mb-5"> report on learning progress and achievement</h1>
                           <table class="table table-bordered " border="1">
                               <thead style="background: none">
                                   <tr class="text-center fw-bold">
                                       <td rowspan="2" style="width:25%">Learning Areas</td>
                                       <td colspan="4" style="width:25%">Quarter</td>
                                       <td rowspan="2" style="width:25%">Final Grade</td>
                                       <td rowspan="2" style="width:25%">Remark</td>
                                   </tr>
                                   <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                   </tr>
                               </thead>
                               <tbody>
                                        <td>Filipino</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>English</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>Math</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>Science</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>Araling Panlipunan</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>Edukasyon sa Pagpapakatao <br>(Esp)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <th style="border-bottom: 1px solid transparent">MAPEH</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom: 1px solid transparent">Music</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom: 1px solid transparent">Arts</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom: 1px solid transparent">P.E.</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td >Health</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="text-center fw-bold">
                                        <td></td>
                                        <td colspan="4">General Average</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                               </tbody>
                           </table>
                           <div class="row mt-2" id="descriptors">
                                <table class="table table-sm ">
                                    <thead style="background: none">
                                        <tr class="fw-bold">
                                            <th>Descriptors</th>
                                            <th>Grading Scale</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Outstanding</td>
                                            <td>90-100</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>Very Satisfactory</td>
                                            <td>85-89</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>Satisfactory</td>
                                            <td>80-84</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>Fairly Satisfactory</td>
                                            <td>75-79</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>Did not Meet Expectations</td>
                                            <td>Below 75</td>
                                            <td>Failed</td>
                                        </tr>
                                    </tbody>
                                </table>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--End CONTAINER--}}


  

@endsection
