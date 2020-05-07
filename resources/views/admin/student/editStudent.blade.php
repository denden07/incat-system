@extends('layouts.teacherHome',['year'=>$year,'quarter'=>$quarter])


@section('title')
   Edit Student | Admin
@endsection


@section('student-status')

    active
@endsection

@section('student-list-status')
    active
@endsection

@section('contents')

{!! Form::model($student ,['method'=>'PATCH','action'=>['AdminStudentController@updateStudent',$student->id]])  !!}


@include('layouts._message')
{{--<div class="form-group">--}}
    {{--{!! Form::label('lastName','Last Name:') !!}--}}
    {{--{!! Form::text('lastName',null,['class'=>'form-control']) !!}--}}
{{--</div>--}}

    <div class="student-edit-form">



            <div class="sub-enrollment-banner">
                <h3>Edit Student Information</h3>
            </div>

            <div style="margin-top: 25px" class="container">

                <div class="row justify-content-center">
                    <div  class="col-lg-4">

                        {!! Form::text('psaNo',null,['class'=>'form-control']) !!}
                        {!! Form::label('psaNo','Psa Birth Certificate Number:') !!}



                    </div>

                    <div class="col-lg-4">


                        {!! Form::text('lrnNo',null,['class'=>'form-control']) !!}
                        {!! Form::label('lrnNo',"Learner's Reference No(LRN):") !!}




                    </div>
                </div>



            </div>


            <div class="container">
                <div class="col-lg-12">

                    <div style="margin-top: 20px">
                        <div style="padding: 25px" class="row justify-content-center">

                            <div class="col-lg-1">
                                <p style="color: black;font-size: 21px;margin-top: 2px">Name: </p>
                            </div>
                            <div class="col">
                                {!! Form::text('lastName',null,['class'=>'form-control ']) !!}
                                {!! Form::label('lastName',"Last Name") !!}
                                @if($errors->has('lastName'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('lastName')}}</strong>
                                    </div>

                                @endif




                            </div>

                            <div class="col">
                                {!! Form::text('firstName',null,['class'=>'form-control ']) !!}
                                {!! Form::label('firstName',"First Name") !!}
                                @if($errors->has('firstName'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('firstName')}}</strong>
                                    </div>

                                @endif
                            </div>

                            <div class="col">
                                {!! Form::text('middleName',null,['class'=>'form-control ']) !!}
                                {!! Form::label('middleName',"Middle Name") !!}
                                @if($errors->has('middleName'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('middleName')}}</strong>
                                    </div>

                                @endif
                            </div>

                            <div class="col">
                                {!! Form::text('extName',null,['class'=>'form-control ']) !!}
                                {!! Form::label('extName',"Extension Name") !!}
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="container">

                <div style="padding: 10px 40px" class="row justify-content-center">
                    <div class="col">

                        {!! Form::date('dob',null,['class'=>'form-control ']) !!}
                        {!! Form::label('dob','Date of Birth:') !!}

                    </div>

                    <div class="col">

                        {!! Form::select('sex',['Male'=>'Male','Female'=>'Female'],null,['class'=>'form-control']) !!}
                        {!! Form::label('sex','Sex:') !!}



                        @if($errors->has('sex'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('sex')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col">

                        {!! Form::text('age',null,['class'=>'form-control ']) !!}
                        {!! Form::label('age',"Age") !!}

                        @if($errors->has('age'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('age')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col">
                        {!! Form::text('religion',null,['class'=>'form-control ']) !!}
                        {!! Form::label('religion',"Religion") !!}

                    </div>

                    <div class="col">
                        {!! Form::text('mothertongue',null,['class'=>'form-control ']) !!}
                        {!! Form::label('mothertongue',"Mother Tongue") !!}

                        @if($errors->has('mothertongue'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('mothertongue')}}</strong>
                            </div>

                        @endif
                    </div>

                </div>

            </div>


            <div class="container">

                <div style="padding: 10px 200px" class="row justify-content-around">
                    <div style="margin-left: -150px" class="col-lg-2">
                        <p>Belongs to indigenous People/Community?</p>
                    </div>
                    <div style="margin-left: -320px;margin-top: 5px" class="col-lg-1">
                        <input id="indegent" type="radio" class="form-check-input" value="0">
                        <label for="indegent">No</label>
                    </div>
                    <div style="margin-left: -400px" class="col-lg-5">
                        {!! Form::text('indigenous',null,['class'=>'form-control ']) !!}
                    </div>
                </div>
            </div>


        </div>

        <div class="sub-enrollment-banner">
            <h3>Address</h3>
        </div>
        <div class="container">
            <div style="padding: 25px 45px" class="row justify-content-center">

                {!! Form::text('address',null,['class'=>'form-control ']) !!}




            </div>
        </div>

        <div class="sub-enrollment-banner">
            <h3>Parents/Guardian's Information</h3>
        </div>
        <div style="padding: 35px" class="container">
            <div  class="row">
                <div class="col">
                    {!! Form::text('fatherName',null,['class'=>'form-control ']) !!}
                    {!! Form::label('fatherName',"Father's Name") !!}
                    @if($errors->has('fatherName'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('fatherName')}}</strong>
                        </div>

                    @endif
                </div>


                <div class="col">
                    {!! Form::text('motherName',null,['class'=>'form-control ']) !!}
                    {!! Form::label('motherName',"Mother's Name") !!}
                    @if($errors->has('motherName'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('motherName')}}</strong>
                        </div>

                    @endif
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6">
                    {!! Form::text('guardianName',null,['class'=>'form-control ']) !!}
                    {!! Form::label('guardianName',"Guardian's Name") !!}
                    @if($errors->has('guardianName'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('guardianName')}}</strong>
                        </div>

                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col">
                    {!! Form::text('parentCpNo',null,['class'=>'form-control ']) !!}
                    {!! Form::label('parentCpNo',"Cellphone No.") !!}
                    @if($errors->has('parentCpNo'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('parentCpNo')}}</strong>
                        </div>

                    @endif
                </div>


                <div class="col">
                    {!! Form::text('parentTpNo',null,['class'=>'form-control ']) !!}
                    {!! Form::label('parentTpNo',"Telephone No.") !!}
                </div>

            </div>


        </div>

        <div class="sub-enrollment-banner">
            <h3>FOR RETURNING LEARNERS('Balik-Aral') and THOSE WHO SHALL TRANSFER/MOVE IN</h3>
        </div>

        <div style="padding: 35px" class="container">
            <div class="row">
                <div class="col">
                    {!! Form::text('lastGrade',null,['class'=>'form-control ']) !!}
                    {!! Form::label('lastGrade',"Last Grade Level Completed") !!}
                </div>

                <div class="col">
                    {!! Form::text('lastSchoolYear',null,['class'=>'form-control ']) !!}
                    {!! Form::label('lastSchoolYear',"Last School Year Completed") !!}
                </div>

                <div class="col">
                    {!! Form::text('lastSchoolId',null,['class'=>'form-control ']) !!}
                    {!! Form::label('lastSchoolId',"School Id") !!}
                </div>

            </div>

            <div class="row">

                <div class="col">
                    {!! Form::text('lastSchool',null,['class'=>'form-control ']) !!}
                    {!! Form::label('lastSchool',"School Name") !!}
                </div>

                <div class="col">
                    {!! Form::text('lastSchoolAddress',null,['class'=>'form-control ']) !!}
                    {!! Form::label('lastSchoolAddress',"School Address") !!}
                </div>

            </div>
        </div>
        <div class="sub-enrollment-banner">
            <h3>For Learners in SENIOR HIGH SCHOOL</h3>
        </div>
        <div style="padding: 35px" class="container">

            <div class="row">

                <div class="col-lg-3">
                    {!! Form::label('gradeLevel','Grade Level:') !!}
                    {!! Form::select('gradeLevel',[''=>'Choose here']+$levels,null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-3">
                    {!! Form::label('strand','Track:') !!}
                    {!! Form::select('strand',[''=>'Choose here']+$strands,null,['class'=>'form-control']) !!}
                </div>

                {{--<div class="col-lg-3">--}}
                    {{--<label for="">Track:</label>--}}
                    {{--<select  class="{{$errors->has('track')?'is-invalid' : ""}}" name="track" id="track-selector">--}}
                        {{--<option value="" selected disabled hidden>Choose here</option>--}}
                        {{--<option  value="Academic" @if (old('track') == "Academic") {{ 'selected' }} @endif>Academic</option>--}}
                        {{--<option value="Technical-Vocational Livelihood" @if (old('track') == "Technical-Vocational Livelihood") {{ 'selected' }} @endif>Technical-Vocational Livelihood</option>--}}
                    {{--</select>--}}
                    {{--@if($errors->has('track'))--}}
                        {{--<div class="invalid-feedback">--}}
                            {{--<strong>{{$errors->first('track')}}</strong>--}}
                        {{--</div>--}}

                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div style="margin-top: 100px" class="row">--}}
                {{--<div class="col academic-strand">--}}
                    {{--<label for="">Strand:</label>--}}
                    {{--<select class="{{$errors->has('strand')?'is-invalid' : ""}} strand" name="strand">--}}
                        {{--<option value="" selected disabled hidden>Choose here</option>--}}

                        {{--@foreach($strands1 as $strand)--}}
                            {{--<option value="{{$strand->id}}" @if (old('strand') == "{{$strand->name}}") {{ 'selected' }} @endif>{{$strand->name}}</option>--}}

                        {{--@endforeach--}}
                    {{--</select>--}}
                    {{--@if($errors->has('strand'))--}}
                        {{--<div class="invalid-feedback">--}}
                            {{--<strong>{{$errors->first('strand')}}</strong>--}}
                        {{--</div>--}}

                    {{--@endif--}}
                {{--</div>--}}

                {{--<div class="col technical-strand">--}}
                    {{--<label for="">Strand:</label>--}}
                    {{--<select class="{{$errors->has('strand')?'is-invalid' : ""}} strand-1"  name="strand" >--}}
                        {{--<option value="" selected disabled hidden>Choose here</option>--}}
                        {{--<optgroup label="(HE) Home Economics">--}}

                            {{--@foreach($strands2 as $strand2)--}}

                                {{--<option value="{{$strand2->id}}" @if (old('strand') == "{{$strand2->name}}") {{ 'selected' }} @endif>{{$strand2->name}}</option>--}}

                            {{--@endforeach--}}

                        {{--</optgroup>--}}

                        {{--<optgroup label="(ICT) Information And Communication Technology">--}}

                            {{--@foreach($strands3 as $strand3)--}}
                                {{--<option value="{{$strand3->id}}" @if (old('strand') == "{{$strand3->name}}") {{ 'selected' }} @endif>{{$strand3->name}}</option>--}}

                            {{--@endforeach--}}

                        {{--</optgroup>--}}

                        {{--<optgroup label="(IA) Industrial Arts">--}}
                            {{--@foreach($strands4 as $strand4)--}}

                                {{--<option value="{{$strand4->id}}" @if (old('strand') == "{{$strand4->name}}") {{ 'selected' }} @endif>{{$strand4->name}}</option>--}}

                            {{--@endforeach--}}

                        {{--</optgroup>--}}

                    {{--</select>--}}
                    {{--@if($errors->has('strand'))--}}
                        {{--<div class="invalid-feedback">--}}
                            {{--<strong>{{$errors->first('strand')}}</strong>--}}
                        {{--</div>--}}

                    {{--@endif--}}
                </div>
            </div>
        </div>


        <div class="container justify-content-center">
            <div class="row offset-6">

                <button id="submit" class="btn btn-success col-lg-5" type="submit">Submit</button>

            </div>

        </div>








    </div>
{!! Form::close() !!}

@endsection