@extends('layouts.teacherHome',['year'=>$year,'quarter'=>$quarter])



@section('contents')

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




    </div>


    
@endsection