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


                        <div class="col-4">

                            {!! Form::label('marital','Marital Status:') !!}
                            {!! Form::select('marital',['Single'=>'Single','Married'=>'Married','Widowed'=>'Widowed','Separated'=>'Separated','Divorced'=>'Divorced',],null) !!}

                            @if($errors->has('marital'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('marital')}}</strong>
                                </div>

                            @endif
                        </div>

                        <div class="col-4">
                            {!! Form::label('religion','Religion:') !!}
                            {!! Form::text('religion',null) !!}
                        </div>




                        <div class="col-4">

                            {!! Form::label('mothertongue','Mother Tongue:') !!}
                            {!! Form::text('mothertongue',null) !!}

                            @if($errors->has('mothertongue'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('mothertongue')}}</strong>
                                </div>
                            @endif
                        </div>
                    </div>




                    <div  style="margin-top: 3%" class="row justify-content-center">
                        <div class="col">

                            {!! Form::label('position','Position:') !!}
                            {!! Form::text('position',null) !!}


                        </div>

                        <div class="col">


                            {!! Form::label('date_appointed','Date Appointed:') !!}
                            {!! Form::date('date_appointed',null) !!}


                        </div>


                    </div>

                </div>
            </div>

            <h5>Education</h5>

            <div class="teacher-add-education-1">
                <div class="row">


                    <div class="col-4">

                        {!! Form::label('vocational','Vocational: ') !!}
                        {!! Form::text('vocational',null) !!}

                    </div>

                    <div class="col-4">

                        {!! Form::label('course','Degree:') !!}
                        {!! Form::text('course',null) !!}


                    </div>

                    <div class="col-4">

                        {!! Form::label('postGraduate','Post Graduate:') !!}
                        {!! Form::text('postGraduate',null) !!}


                    </div>


                </div>
            </div>

            <div class="teacher-add-education-2">

                <div style="margin-bottom:2% "  class="row">
                    <div class="col">

                        {!! Form::label('yearGraduated','Year Graduated:') !!}
                        {!! Form::text('yearGraduated',null) !!}

                    </div>

                    <div class="col">

                        {!! Form::label('lastSchoolAttended','Last School Attended:') !!}
                        {!! Form::text('lastSchoolAttended',null) !!}

                    </div>


                </div>

                <div class="row">

                    <div class="col">

                        {!! Form::label('expertise','Skills:') !!}
                        {!! Form::text('expertise',null) !!}


                    </div>


                    <div class="col">

                        {!! Form::label('award','Awards:') !!}
                        {!! Form::text('award',null) !!}

                    </div>

                    <div class="col">

                        {!! Form::label('lastSchoolTeached','Last School Teached::') !!}
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

        <h5>Other Information</h5>
        <div class="teacher-add-system">
            <div class="row justify-content-center" >
                <div class="col-4">

                    {!! Form::label('employee_id','Employee ID:') !!}
                    {!! Form::text('employee_id',null) !!}


                </div>


                <div class="col-4">

                    {!! Form::label('station_id','Station ID:') !!}
                    {!! Form::text('station_id',null) !!}


                </div>

                <div class="col-4">

                    {!! Form::label('umid_id','UMID ID:') !!}
                    {!! Form::text('umid_id',null) !!}


                </div>
            </div>
            <div class="row justify-content-center" >
                <div class="col-4">

                    {!! Form::label('phil_health','Philhealth ID:') !!}
                    {!! Form::text('phil_health',null) !!}

                </div>

                <div class="col-4">

                    {!! Form::label('pag_ibig','Pagibig ID:') !!}
                    {!! Form::text('pag_ibig',null) !!}


                </div>


                <div class="col-4">

                    {!! Form::label('gsis_id','GSIS ID:') !!}
                    {!! Form::text('gsis_id',null) !!}


                </div>

            </div>

            <div class="row justify-content-center" >
                <div class="col-4">

                    {!! Form::label('prc_id','PRC ID:') !!}
                    {!! Form::text('prc_id',null) !!}


                </div>
            </div>




        </div>


            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">Update Teacher</button>
            </div>






        {!! Form::close() !!}

    </div>

@endsection