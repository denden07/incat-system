@extends('layouts.teacherHome')

@section('title')
    Student List | Admin
@endsection

@section('css')


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

    <div class="container student-info-info-container">
        <div class="row">
            <div  class="col  student-personal-info">
                <h4>Personal Info</h4>

                <p>Name: {{$student->name}}</p>
                <p>Age: {{$student->age}}</p>
                @if($student->sex ==1)
                <p>Sex: Male</p>
                 @else
                    <p>Sex: Female</p>
                    @endif
                <p>Address: {{$student->address}}</p>
                <p>Birthday: {{$student->dob}}</p>
                <p>Religion: {{$student->religion}}</p>
                <p>Mother Tounge: {{$student->mothertongue}}</p>
                @if(empty($student->indigenous))

                <p>Indgenous Group: None</p>
                    @else
                <p>Indgenous Group:$student->indigenous </p>
                    @endif
            </div>
            <div class="col">
               <div class="col student-info-school-status">
                <h4>School Info</h4>
                   @if(empty($student->lrnNo))
                   <p>Lrn: None</p>
                   @else
                   <p>Lrn: {{$student->lrnNo}}</p>
                       @endif
                   <p>Grade: {{$student->level->name}}</p>
                   <p>Section: Tba</p>
                   <p>Stand: {{$student->strand}}</p>
                   @if($student->status == "enrolled")
                   <p>Status: <span class="alert-success">Enrolled</span> </p>
                       @elseif($student->status =="transferee")
                       <p>Status: <span class="alert-primary">Enrolled</span> </p>
                       @elseif($students->status == "drop")
                       <p>Status: <span class="alert-danger">Enrolled</span> </p>
                       @endif
               </div>

                <div class="col student-info-emergency">
                    <h4>Parents/Emergency Contact</h4>
                    <p>Father's name: {{$student->fatherName}}</p>
                    <p>Mothers's name: {{$student->motherName}}</p>
                    <p>Mothers's name: {{$student->guardianName}}</p>
                    @if(empty($student->parentCpNo))
                        <p>Contact no: {{$student->parentTpNo}}</p>
                    @elseif(empty($student->parentTpNo))
                    <p>Contact no: {{$student->parentCpNo}}</p>
                    @elseif(!empty($student->parentCpNo)&&(!empty($student->parentTpNo)))
                        <p>Cellphone no: {{$student->parentCpNo}}</p>
                        <p>Telephone no: {{$student->parentTpNo}}</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    @endsection