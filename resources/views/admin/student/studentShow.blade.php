@extends('layouts.teacherHome')

@section('title')
    Student List | Admin
@endsection


@section('student-status')

    active
@endsection

@section('student-list-status')
    active
@endsection

@section('contents')

    <div class="container student-info-body">
        <div class="row">
            <div class="col-lg-12">


                <a href="{{route('admin.student.list')}}"><p class="student-info-back" ><i class="fas fa-arrow-circle-left"></i>Student List</p></a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <h1 class="student-info-banner" >Student Info</h1>
            </div>
        </div>

        <div  class="row action-buttons">
            <h5>Actions:</h5>
            <div class="student-info-show-delete col-1">
            <span ><a href="{{route('admin.student.form.docx',['student_id'=>$student->id])}}"><i  class="fas fa-print"></i></a></span>
            <span>Print</span>
            </div>
            <div class="student-info-show-delete col-1">
                <span ><a href="{{route('admin.student.form.docx',['student_id'=>$student->id])}}"><i class="fas fa-edit"></i></a></span>
                <span style="display: block;text-align: center">Edit</span>
            </div>
        </div>

    <div class="container student-info-info-container">
        <div class="row">
            <div  class="col  student-personal-info">
                <h4>Personal Info</h4>

                <p><span>Name: </span> {{$student->name}}</p>
                <p><span>Age:  </span> {{$student->age}}</p>
                @if($student->sex ==1)
                <p><span>Sex: </span> Male</p>
                 @else
                    <p>Sex: Female</p>
                    @endif
                <p><span>Address: </span> {{$student->address}}</p>
                <p><span>Birthday: </span> {{$student->dob}}</p>
                <p><span>Religion: </span> {{$student->religion}}</p>
                <p><span>Mother Tounge:</span> {{$student->mothertongue}}</p>
                @if(empty($student->indigenous))

                <p><span>Indgenous Group: </span>  None</p>
                    @else
                <p><span>Indgenous Group: </span>{{$student->indigenous}} </p>
                    @endif
            </div>
            <div class="col">
               <div class="col student-info-school-status">
                <h4>School Info</h4>
                   @if(empty($student->lrnNo))
                   <p><span>Lrn: None </span></p>
                   @else
                   <p><span>Lrn: </span> {{$student->lrnNo}}</p>
                       @endif
                   <p><span>Grade: </span> {{$student->level->name}}</p>
                   <p><span>Section: Tba </span></p>
                   <p><span>Stand: </span> {{$student->strand}}</p>
                   @if($student->status == "enrolled")
                   <p><span>Status: </span> <span class="alert-success">Enrolled</span> </p>
                       @elseif($student->status =="transferee")
                       <p><span>Status: </span> <span class="alert-primary">Transferee</span> </p>
                       @elseif($students->status == "drop")
                       <p><span>Status: </span> <span class="alert-danger">Drop</span> </p>
                       @endif
               </div>

                <div class="col student-info-emergency">
                    <h4>Parents/Emergency Contact</h4>
                    <p><span>Father's name: </span> {{$student->fatherName}}</p>
                    <p><span>Mothers's name: </span> {{$student->motherName}}</p>
                    <p><span>Mothers's name: </span> {{$student->guardianName}}</p>
                    @if(empty($student->parentCpNo))
                        <p><span>Contact no: </span> {{$student->parentTpNo}}</p>
                    @elseif(empty($student->parentTpNo))
                    <p><span>Contact no:  </span>{{$student->parentCpNo}}</p>
                    @elseif(!empty($student->parentCpNo)&&(!empty($student->parentTpNo)))
                        <p><span>Cellphone no: </span> {{$student->parentCpNo}}</p>
                        <p><span>Telephone no: </span> {{$student->parentTpNo}}</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    @endsection