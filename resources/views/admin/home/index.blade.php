@extends('layouts.teacherHome',['year'=>$year,'quarter'=>$quarter])



@section('contents')
    @include('layouts._message')
    <div class="items">
        <div class="school-year-card-admin">

            <div class="school-year-selected-admin ">
              <div class="school-year-selected-admin-calendar  row">
                 <span class="col-1 calendar-icon"><i class="fas fa-calendar-alt"></i></span>
                  <span class="col-3 calendar-status">Current School Year: <span class="calendar-status-year">{{$setting->sy}}</span></span>
              </div>
            </div>


                <div class="quarter-selector-card row">

                    <div class="quarter-selector-text col-4">
                        <span>Quarter Selector:</span>
                    </div>
                    <div class="quarter-selector col">
                        <select  onchange="location = this.value;" name="" id="">
                            @if($quarter == "1st")
                                <option value="" selected>1st</option>
                            @else
                                <option value="{{route('change.quarter-1',['year'=>$year])}}">1st</option>
                            @endif

                                @if($quarter == "2nd")
                                    <option value="" selected>2nd</option>
                                @else
                                    <option value="{{route('change.quarter-2',['year'=>$year])}}">2nd</option>
                                @endif

                                @if($quarter == "3rd")
                                    <option value="" selected>3rd</option>
                                @else
                                    <option value="{{route('change.quarter-3',['year'=>$year])}}">3rd</option>
                                @endif

                                @if($quarter == "4th")
                                    <option value="" selected>4th</option>
                                @else
                                    <option value="{{route('change.quarter-4',['year'=>$year])}}">4th</option>
                                @endif
                        </select>
                    </div>
                    <div class="quarter-selector-text col-4">
                        <span>Semester Selector:</span>
                    </div>
                    <div class="quarter-selector col">
                        <select  onchange="location = this.value;" name="" id="">
                            @if($setting->firstS == "active")
                                <option value="" selected>1st</option>
                            @else
                                <option value="{{route('change.sem-1',['year'=>$year])}}">1st</option>
                            @endif


                                @if($setting->secondS == "active")
                                    <option value="" selected>2nd</option>
                                @else
                                    <option value="{{route('change.sem-2',['year'=>$year])}}">2nd</option>
                                @endif
                        </select>
                    </div>

                </div>

        </div>
    </div>

    <div class="items ">
        <div class="total-student-count-admin">
            <div class="total-student-count-admin-card">
                <span class="student-count-admin"><i class="fas fa-user-graduate"></i></span>
                <div class=" total-student-count-admin-card-counter">
                 <span>Total Students:</span> <span class="total-student-count-admin-total">{{$students->count()}}</span>
                <div class="total-student-count-admin-card-sex">
                    <span><i class="fas fa-mars"></i></span>
                    <span>Total Male:</span> <span class="total-student-count-admin-total">{{$students->where('sex','Male')->count()}}</span>

                </div>

                <div class="total-student-count-admin-card-sex">
                    <span><i class="fas fa-venus"></i></span>
                    <span>Total Female:</span> <span class="total-student-count-admin-total">{{$students->where('sex','Female')->count()}}</span>
                </div>
            </div>
            </div>
        </div>


        <div class="total-teacher-count-admin">
            <div class="total-teacher-count-admin-card">
                <span class="teacher-count-admin"><i class="fas fa-chalkboard-teacher"></i></span>
                <div class=" total-teacher-count-admin-card-counter">
                    <span class="total-teacher-count-admin-total">Total Teacher:</span> <span class="total-student-count-admin-total">{{$teachers->count()}}</span>
                </div>
            </div>
        </div>

        <div class="total-section-count-admin">
            <div class="total-section-count-admin-card">
                <span class="section-count-admin"><i class="fas fa-users"></i></span>
                <div class="total-section-count-admin-card-counter">
                    <span class="total-section-count-admin-total">Total Section:</span><span class="total-student-count-admin-total">{{$sections->count()}}</span>
                </div>
            </div>
        </div>



        <div class="enrollment-data">
             <div class="enrollment-data-banner">
                 <h3>TOTAL NUMBER OF ENROLEES</h3>
                 <h4>SCHOOL YEAR {{$year}}</h4>
                 @if($setting->firstS == "active")

                 <h4>FIRST SEMESTER</h4>
                 @else
                     <h4>SECOND SEMESTER</h4>
                 @endif
             </div>
            @if($setting->firstS == "active")

                    <a href="{{route('generate.enrollee',['year'=>$setting->sy,'sem'=>'1st'])}}">Generate Enrolees</a>


            @else

                <a href="{{route('generate.enrollee',['year'=>$setting->sy,'sem'=>'2nd'])}}">Generate Enrolees</a>

            @endif
            <a href="{{route('print.enrollee',['year'=>$setting->sy,'sem'=>'okioki'])}}">Print Data</a>
            @if($record)
            <div class="enrollment-data-table">
                <table>
                    <thead>
                    <th>GRADE LEVEL</th>
                    <th>MALE</th>
                    <th>FEMALE</th>
                    <th>TOTAL</th>
                    </thead>

                    <tbody>
                    <tr>
                        <td>GRADE 11</td>
                        <td>{{$record->grade_11_m}}</td>
                        <td>{{$record->grade_11_f}}</td>
                        <td>{{$record->grade_11_t}}</td>
                    </tr>

                    <tr>
                        <td>GRADE 12</td>
                        <td>{{$record->grade_12_m}}</td>
                        <td>{{$record->grade_12_f}}</td>
                        <td>{{$record->grade_12_t}}</td>
                    </tr>

                    <tr>
                        <td>OVERALL TOTAL</td>
                        <td>{{$record->grade_total_m}}</td>
                        <td>{{$record->grade_total_f}}</td>
                        <td>{{$record->strand_total}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>


            <div style="margin-top: 3%" class="enrollment-data-by-strand-banner">
                <h3>NUMBER OF ENROLEES</h3>
                <h4>SCHOOL YEAR {{$year}}</h4>
                @if($setting->firstS == "active")

                    <h4>FIRST SEMESTER</h4>
                @else
                    <h4>SECOND SEMESTER</h4>
                @endif
            </div>



            <div class="enrollment-data-table-1">
                <table style="width: 100%">
                    <thead>
                    <th>STRAND</th>
                    <th>MALE</th>
                    <th>FEMALE</th>
                    <th>TOTAL</th>
                    </thead>

                    <tbody>
                    <tr class="no-border-enrollee-data">
                        <td>Academic</td>
                    </tr>

                    <tr>
                        <td>(ABM) Accountancy,Business And Management</td>
                        <td>{{$record->abm_t_m}}</td>
                        <td>{{$record->abm_t_f}}</td>
                        <td>{{$record->abm_t}}</td>
                    </tr>

                    <tr>
                        <td>(HUMSS) Humanities and Social Studies</td>
                        <td>{{$record->humss_t_m}}</td>
                        <td>{{$record->humss_t_f}}</td>
                        <td>{{$record->humss_t}}</td>
                    </tr>

                    <tr>
                        <td>(STEM) Science, Techonological, Engineering and Mathematics	</td>
                        <td>{{$record->stem_t_m}}</td>
                        <td>{{$record->stem_t_f}}</td>
                        <td>{{$record->stem_t}}</td>
                    </tr>
                    <tr  class="no-border-enrollee-data">
                        <td>TECHNICAL VOCATIONAL LIVELIHOOD</td>
                    </tr>

                    <tr  class="no-border-enrollee-data">
                       <td> HOME ECONOMICS</td>
                    </tr>

                    <tr>
                        <td>(BC) Beauty Care</td>
                        <td>{{$record->bc_t_m}}</td>
                        <td>{{$record->bc_t_f}}</td>
                        <td>{{$record->bc_t}}</td>
                    </tr>

                    <tr>
                        <td>(GT) Garments Technology</td>
                        <td>{{$record->gt_t_m}}</td>
                        <td>{{$record->gt_t_f}}</td>
                        <td>{{$record->gt_t}}</td>
                    </tr>

                    <tr>
                        <td>(FPS) Food Products Servicing</td>
                        <td>{{$record->fps_t_m}}</td>
                        <td>{{$record->fps_t_f}}</td>
                        <td>{{$record->fps_t}}</td>
                    </tr>

                    <tr>
                        <td>(HRS) Hotel & Restaurant Servicing</td>
                        <td>{{$record->hrs_t_m}}</td>
                        <td>{{$record->hrs_t_f}}</td>
                        <td>{{$record->hrs_t}}</td>
                    </tr>

                    <tr  class="no-border-enrollee-data">
                       <td>INFORMATION AND COMMUNICATION TECHNOLOGY</td>
                    </tr>

                    <tr>
                        <td>(CSS) Computer System Servicing</td>
                        <td>{{$record->css_t_m}}</td>
                        <td>{{$record->css_t_f}}</td>
                        <td>{{$record->css_t}}</td>
                    </tr>

                    <tr>
                        <td>(TDA) Technical Drafting and Animation</td>
                        <td>{{$record->tda_t_m}}</td>
                        <td>{{$record->tda_t_f}}</td>
                        <td>{{$record->tda_t}}</td>
                    </tr>


                    <tr  class="no-border-enrollee-data">
                        <td> Industrial Arts</td>
                    </tr>
                    <tr>
                        <td>(ATS) Automotive Servicing</td>
                        <td>{{$record->ats_t_m}}</td>
                        <td>{{$record->ats_t_f}}</td>
                        <td>{{$record->ats_t}}</td>
                    </tr>

                    <tr>
                        <td>(EIM) Electrical Installation And Maintenance</td>
                        <td>{{$record->eim_t_m}}</td>
                        <td>{{$record->eim_t_f}}</td>
                        <td>{{$record->eim_t}}</td>
                    </tr>

                    <tr>
                        <td>(EPAS) Electornic Products Assembly and Servicing</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>(RAC) Refrigiration and Air-conditioning Servicing</td>
                        <td>{{$record->rac_t_m}}</td>
                        <td>{{$record->rac_t_f}}</td>
                        <td>{{$record->rac_t}}</td>
                    </tr>

                    <tr class="footer-enrolle-data">
                        <td>Over All Total</td>
                        <td>{{$record->strand_t_m}}</td>
                        <td>{{$record->strand_t_f}}</td>
                        <td>{{$record->strand_total}}</td>
                    </tr>


                    </tbody>
                </table>

            </div>
            @endif
        </div>


    </div>


    
@endsection