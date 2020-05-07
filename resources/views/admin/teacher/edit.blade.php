@extends('layouts.teacherHome')

@section('teacher-status')

    active
@endsection

@section('teacher-add-status')
    active
@endsection

@section('title')
    Edit Teacher | Admin
@endsection

@section('contents')

    <div class="teacher-add-body">

        <h2 class="teacher-add-banner">Edit Teacher</h2>



        {!! Form::model($teacher,['method'=>'PATCH','action'=>['AdminTeacherController@updateTeacher',$teacher->id]])  !!}
            @csrf
            <h5>TEACHER'S BASIC INFORMATION</h5>
            @include('layouts._message')
            <div class="teacher-add-name">
                <div class="row">

                    <div class="col">

                        {!! Form::label('lastName','Last Name:') !!}
                        {!! Form::text('lastName',null,['class'=>'col-6']) !!}

                        @if($errors->has('lastName'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('lastName')}}</strong>
                            </div>

                        @endif

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {!! Form::label('firstName','First Name:') !!}
                        {!! Form::text('firstName',null,['class'=>'col-6']) !!}

                        @if($errors->has('firstName'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('firstName')}}</strong>
                            </div>

                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        {!! Form::label('middleName','Middle Name') !!}
                        {!! Form::text('middleName',null,['class'=>'col-6']) !!}

                        @if($errors->has('middleName'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('middleName')}}</strong>
                            </div>

                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        {!! Form::label('extensionName','Name Extension') !!}
                        {!! Form::text('extensionName',null,['class'=>'col-6']) !!}

                    </div>
                </div>
            </div>

            <div class="teacher-add-additional-details">
                <div class="teacher-add-additional-details-first">
                    <div class="row justify-content-center">
                        <div class="col-2">
                            {!! Form::label('sex','Sex:') !!}
                            {!! Form::select('sex',['Male'=>'Male','Female'=>'Female'],null) !!}
                            @if($errors->has('sex'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('sex')}}</strong>
                                </div>

                            @endif
                        </div>

                        <div class="col">
                            {!! Form::label('dob','Date of Birth:') !!}
                            {!! Form::date('dob',null) !!}



                            @if($errors->has('dob'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('dob')}}</strong>
                                </div>

                            @endif
                        </div>

                        <div class="col">

                            {!! Form::label('age','Age:') !!}
                            {!! Form::number('age',null,['class'=>'col-6']) !!}

                            @if($errors->has('age'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('age')}}</strong>
                                </div>

                            @endif
                        </div>
                        <div class="col">
                            {!! Form::label('contactNo','Contact Number:') !!}
                            {!! Form::number('contactNo',null) !!}
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
                            {!! Form::label('address','Address:') !!}
                            {!! Form::text('address',null,['class'=>'col-10']) !!}
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

                            {!! Form::label('religion','Religion:') !!}
                            {!! Form::text('religion',null) !!}


                            @if($errors->has('religion'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('religion')}}</strong>
                                </div>

                            @endif
                        </div>




                        <div class="col">

                            {!! Form::label('mothertongue','Mother Tongue:') !!}
                            {!! Form::text('mothertongue',null) !!}


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
                        {!! Form::label('course','Course:') !!}
                        {!! Form::text('course',null) !!}
                        @if($errors->has('course'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('course')}}</strong>
                            </div>

                        @endif
                    </div>




                    <div class="col">
                        {!! Form::label('yearGraduated','Year Graduated:') !!}
                        {!! Form::text('yearGraduated',null) !!}
                        @if($errors->has('yearGraduated'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('yearGraduated')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col">
                        {!! Form::label('lastSchoolAttended','Last School Attended:') !!}
                        {!! Form::text('lastSchoolAttended',null) !!}
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
                        {!! Form::label('expertise','Expertise:') !!}
                        {!! Form::text('expertise',null) !!}
                        @if($errors->has('expertise'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('expertise')}}</strong>
                            </div>

                        @endif
                    </div>


                    <div class="col">
                        {!! Form::label('award','Awards:') !!}
                        {!! Form::text('award',null) !!}
                    </div>

                    <div class="col">
                        {!! Form::label('lastSchoolTeached','Last School Teached:') !!}
                        {!! Form::text('lastSchoolTeached',null) !!}

                    </div>
                </div>
            </div>


            <h5>System Account</h5>

            <div class="teacher-add-system">
                <div class="row justify-content-center" >
                    <div class="col-3">
                        {!! Form::label('user[name]','User Name:') !!}
                        {!! Form::text('user[name]',null) !!}
                    </div>
                    <div class="col-3">
                        {!! Form::label('user[email]','Email:') !!}
                        {!! Form::email('user[email]',null) !!}
                    </div>

                    <div class="col-3">
                        {!! Form::label('user[password]','Password:') !!}
                        {!! Form::password('user[password]',null) !!}
                    </div>
                </div>
            </div>




            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">Update Teacher</button>
            </div>






        {!! Form::close() !!}

    </div>

@endsection