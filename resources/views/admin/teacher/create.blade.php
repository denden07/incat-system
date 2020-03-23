@extends('layouts.teacherHome')

@section('teacher-status')

    active
@endsection

@section('teacher-add-status')
    active
@endsection

@section('title')
    Add Teacher | Admin
@endsection

@section('contents')

<div class="teacher-add-body">

    <h2 class="teacher-add-banner">Add Teacher</h2>



        <form action="{{route('admin.teacher.store')}}" method="post">
            @csrf
            <h5>TEACHER'S BASIC INFORMATION</h5>
            @include('layouts._message')
        <div class="teacher-add-name">
            <div class="row">

                <div class="col">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" class= "col-6 {{$errors->has('lastName')?'is-invalid' : ""}}">
                    @if($errors->has('lastName'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('lastName')}}</strong>
                        </div>

                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" class= "{{$errors->has('firstName')?'is-invalid' : ""}} col-6">
                    @if($errors->has('firstName'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('firstName')}}</strong>
                        </div>

                    @endif

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="middleName">Middle Name:</label>
                    <input type="text" name="middleName" class= "{{$errors->has('middleName')?'is-invalid' : ""}} col-6">
                    @if($errors->has('middleName'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('middleName')}}</strong>
                        </div>

                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label  for="extensionName">Name Extension:</label>
                    <input class="col-6" type="text" name="extensionName" placeholder="Please indicate Jr.,Sr, III">

                </div>
            </div>
        </div>

<div class="teacher-add-additional-details">
    <div class="teacher-add-additional-details-first">
            <div class="row justify-content-center">
                <div class="col-2">
                    <label for="">Sex:</label>
                    <select  class="{{$errors->has('sex')?'is-invalid' : ""}}" name="sex">
                        <option value="" selected disabled hidden>Choose here</option>
                        <option value="Male" >Male</option>
                        <option value="Female" >Female</option>
                    </select>
                    @if($errors->has('sex'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('sex')}}</strong>
                        </div>

                    @endif
                </div>

                <div class="col">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" class= "{{$errors->has('dob')?'is-invalid' : ""}}">
                    @if($errors->has('dob'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('dob')}}</strong>
                        </div>

                    @endif
                </div>

                <div class="col">
                    <label for="age">Age:</label>
                    <input type="number" name="age" class= "{{$errors->has('age')?'is-invalid' : ""}}">
                    @if($errors->has('age'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('age')}}</strong>
                        </div>

                    @endif
                </div>
                <div class="col">
                    <label for="contactNo">Contact Number:</label>
                    <input type="text" name="contactNo" class= "{{$errors->has('contactNo')?'is-invalid' : ""}}">
                    @if($errors->has('contactNo'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('contactNo')}}</strong>
                        </div>

                    @endif
                </div>
            </div>
    </div>
        <div class="teacher-add-additional-details-second">
            <div class="row">
                <div class="col-12">
                <label for="address">Address: </label>
                <input class="col-10 {{$errors->has('address')?'is-invalid' : ""}}" type="text" name="address" placeholder="House Number/Street/Brgy/Town/City,Province/Country" >
                    @if($errors->has('address'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('address')}}</strong>
                        </div>

                    @endif
                </div>
                </div>
        </div>

    <div class="teacher-add-additional-details-third">
            <div class="row">
                <div class="col">
                    <label for="religion">Religion:</label>
                    <input type="text" name="religion" class= "{{$errors->has('religion')?'is-invalid' : ""}}">
                    @if($errors->has('religion'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('religion')}}</strong>
                        </div>

                    @endif
                </div>




                <div class="col">
                    <label for="mothertongue">Mother Tongue:</label>
                    <input type="text" name="mothertongue" class= "{{$errors->has('mothertongue')?'is-invalid' : ""}}">
                    @if($errors->has('mothertongue'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('mothertongue')}}</strong>
                        </div>
                    @endif
                </div>
            </div>
    </div>
</div>

<h5>Education</h5>

            <div class="teacher-add-education-1">
            <div class="row">
                <div class="col">
                    <label for="course">Course: </label>
                    <input type="text" name="course" class= "{{$errors->has('course')?'is-invalid' : ""}}">
                    @if($errors->has('course'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('course')}}</strong>
                        </div>

                    @endif
                </div>




                <div class="col">
                    <label for="yearGraduated">Year Graduated: </label>
                    <input type="text" name="yearGraduated" class= "{{$errors->has('course')?'is-invalid' : ""}}">
                    @if($errors->has('yearGraduated'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('yearGraduated')}}</strong>
                        </div>

                    @endif
                </div>

                <div class="col">
                    <label for="lastSchoolAttended">Last School Attended: </label>
                    <input type="text" name="lastSchoolAttended" class= "{{$errors->has('lastSchoolAttended')?'is-invalid' : ""}}">
                    @if($errors->has('lastSchoolAttended'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('lastSchoolAttended')}}</strong>
                        </div>

                    @endif
                </div>


            </div>
            </div>

            <div class="teacher-add-education-2">
            <div class="row">

                <div class="col">
                    <label for="expertise">Expertise: </label>
                    <input type="text" name="expertise" class= "{{$errors->has('expertise')?'is-invalid' : ""}}">
                    @if($errors->has('expertise'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('expertise')}}</strong>
                        </div>

                    @endif
                </div>


                <div class="col">
                    <label for="award">Awards: </label>
                    <input type="text" name="award">
                </div>

                <div class="col">
                    <label for="lastSchoolTeached">Last School Teached: </label>
                    <input type="text" name="lastSchoolTeached">
                </div>
            </div>
            </div>


            <h5>System Account</h5>

            <div class="teacher-add-system">
            <div class="row justify-content-center" >
                <div class="col-3">
                    <label for="username">User Name: </label>
                    <input type="text" name="username">
                </div>
                <div class="col-3">
                    <label for="email">Email:  </label>
                    <input type="email" name="email">
                </div>

                <div class="col-3">
                    <label for="password">Password: </label>
                    <input type="password" name="password">
                </div>
            </div>
            </div>


            <h5>Requirements</h5>

            <div class="row justify-content-center">

                <div class="col-5">

                <input type="checkbox" name="nso" value=1>
                    <label for="nso">Nso</label>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <input type="checkbox" name="transcript" value=1>
                    <label for="transcript">Transcript</label>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <input type="checkbox" name="let" value=1>
                    <label for="let">Let Scores</label>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <input type="checkbox" name="prc" value=1>
                    <label for="prc">Prc I.D</label>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <input type="checkbox" name="coe" value=1>
                    <label for="coe">Certificate of Employment(if teached before) </label>
                </div>
            </div>



            <div class="row justify-content-center">
                <div class="col-5">
                    <input type="checkbox" name="certificates" value=1>
                    <label for="certificates">Certificates(NC's) </label>
                </div>
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">Add Teacher</button>
            </div>







        </form>

</div>

@endsection