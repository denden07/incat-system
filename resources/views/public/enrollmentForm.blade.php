<!DOCTYPE html>
<html>

<head>
<title>Enlistment Form</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>


<body>

<div class="wrapper-enlistment">

    <div class="enlistment-banner container">
        <div class="row justify-content-center">

        <img class="col-lg-1" src="{{asset('images/logo/incat.png')}}" alt="">
        <h2 style="margin-left: -70px;margin-top: 10px" class="col-lg-5">Student Enlistment Form</h2>

        </div>
    </div>


    <form id="form-enlist" action="{{route('public-pre-enlistment.store')}}" method="post">
        @csrf
        @include('layouts._message')
        <div class="form-group">
            <div class="sub-enrollment-banner">
            <h3 style="text-align: center;margin-top: 15px">Basic Education Enrollment Form</h3>
            </div>
            <div class="row justify-content-center student-status" >

        <div class="col-lg-4  school-year-holder">
            <div class="row">
                <p class="school-year-year" >School Year:</p>
                <div class="col-lg-4">
                <input value="{{ old('schoolYear1') }}" name="schoolYear1" style="height: 60%" type="text" class="form-control year-input {{$errors->has('schoolYear1')?'is-invalid' : ""}}" >
                    @if($errors->has('schoolYear1'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('schoolYear1')}}</strong>
                        </div>

                    @endif
                </div>
                <p> - </p>
                <div class="col-lg-4">
                 <input value="{{ old('schoolYear2') }}" name="schoolYear2" style="height: 60%"   type="text" class="form-control year-input {{$errors->has('schoolYear2')?'is-invalid' : ""}}" >
                    @if($errors->has('schoolYear2'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('schoolYear2')}}</strong>
                        </div>

                    @endif
                </div>
            </div>
        </div>

                <div class="col-lg-3 lrn-holder">
                    <div class="row">
                <div class="col-lg-3">
                    <p class="lrn-title">Lrn ?</p>
                </div>


                <div class="col-lg-1">
                    <input name="lrnStatus" id="lrn-yes" type="radio" class="form-check-input" value="1">
                    <label for="lrn-yes">Yes</label>
                </div>

                <div class="col-lg-1 offset-1">
                    <input name="lrnStatus" id="lrn-no" type="radio" class="form-check-input" value="0">
                    <label for="lrn-no">No</label>
                </div>
                    </div>
                </div>


                <div class="returning-holder col-lg-2">
                    <input name="old-returning" type="checkbox" value="1" class="form-check-input" id="returning-checkbox">
                    <label for="returning-checkbox" class="returning-title form-check-label">Returning/Balik Aral?(check box if yes)</label>
                </div>


            </div>

            <div class="sub-enrollment-banner">
            <h3>Student Information</h3>
            </div>

            <div style="margin-top: 25px" class="container">

                <div class="row justify-content-center">
                <div  class="col-lg-4">


                    <input  value="{{ old('psaNo') }}"  name="psaNo" class="form-control" type="text">
                    <label>Psa Birth Certificate Number:</label>

                </div>

                <div class="col-lg-4">
                    <input value="{{ old('lrnNo') }}" name="lrnNo" class="form-control" type="text">
                    <label>Learner's Reference No(LRN):</label>


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

                            <input name="lastName" class="form-control {{$errors->has('lastName')?'is-invalid' : ""}}" type="text" value="{{ old('lastName') }}" >
                            <label for="">Last Name</label>
                            @if($errors->has('lastName'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('lastName')}}</strong>
                                </div>

                            @endif

                        </div>

                        <div class="col">
                            <input value="{{ old('firstName') }}"  name="firstName" class="form-control {{$errors->has('firstName')?'is-invalid' : ""}}" type="text">
                            <label for="">First Name</label>
                            @if($errors->has('firstName'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('firstName')}}</strong>
                                </div>

                            @endif
                        </div>
                
                        <div class="col">
                            <input value="{{ old('middleName') }}" name="middleName" class="form-control  {{$errors->has('middleName')?'is-invalid' : ""}}" type="text">
                            <label for="">Middle Name</label>
                            @if($errors->has('middleName'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('middleName')}}</strong>
                                </div>

                            @endif
                        </div>
                
                        <div class="col">
                            <input value="{{ old('extName') }}"  name="extName"  class="form-control" placeholder="eg. Jr. III(if applicable)" type="text">
                            <label for="">Extension Name</label>
                        </div>
                
                 </div>

                 </div>
             </div>
            </div>


            <div class="container">

            <div style="padding: 10px 40px" class="row justify-content-center">
                <div class="col">

                    <input value="{{ old('dob') }}" name="dob"   type="date" class=" {{$errors->has('dob')?'is-invalid' : ""}}">
                    <label for="">Date Of Birth</label>
                    @if($errors->has('dob'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('dob')}}</strong>
                        </div>

                    @endif

                </div>

                <div class="col">
                    <label for="">Sex:</label>
                    <select  class="{{$errors->has('sex')?'is-invalid' : ""}}" name="sex" id="sexValue">
                        <option value="" selected disabled hidden>Choose here</option>
                        <option value="1"  @if (old('sex') == "1") {{ 'selected' }} @endif>Male</option>
                        <option value="2" @if (old('sex') == "2") {{ 'selected' }} @endif>Female</option>
                    </select>
                    @if($errors->has('sex'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('sex')}}</strong>
                        </div>

                    @endif
                </div>

                <div class="col">

                    <input  value="{{ old('age') }}"  name="age" class="form-control {{$errors->has('age')?'is-invalid' : ""}}" type="number">
                    <label for="">Age</label>
                    @if($errors->has('age'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('age')}}</strong>
                        </div>

                    @endif
                </div>

                <div class="col">

                    <input  value="{{ old('religion') }}" name="religion" class="form-control" type="text">
                    <label for="">Religion:</label>
                </div>

                <div class="col">

                    <input value="{{ old('mothertongue') }}" name="mothertongue" class="form-control {{$errors->has('mothertongue')?'is-invalid' : ""}}"  type="text">
                    <label for="">Mother Tongue</label>
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
                        <input value="{{ old('indigenous') }}" name="indigenous" class="form-control" type="text" placeholder="If Yes, Please Specify">
                    </div>
                    </div>
                </div>


            </div>

            <div class="sub-enrollment-banner">
            <h3>Address</h3>
            </div>
            <div class="container">
                <div style="padding: 25px 45px" class="row justify-content-center">

                    <div class="col-lg-1">
                        <input value="{{ old('houseNumber') }}" name="houseNumber" class="form-control" type="text">
                        <label for="">House Number</label>

                    </div>

                    <div class="col">
                        <input value="{{ old('street') }}" name="street" class="form-control {{$errors->has('street')?'is-invalid' : ""}}" type="text">
                        <label for="">Street</label>
                        @if($errors->has('street'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('street')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col">
                        <input value="{{ old('barangay') }}" name="barangay" class="form-control {{$errors->has('barangay')?'is-invalid' : ""}}" type="text">
                        <label for="">Barangay</label>
                        @if($errors->has('barangay'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('barangay')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col">
                        <input value="{{ old('municipality') }}" name="municipality" class="form-control {{$errors->has('municipality')?'is-invalid' : ""}}" type="text">
                        <label for="">City/Municipality</label>
                        @if($errors->has('municipality'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('municipality')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col">
                        <input value="{{ old('province') }}" name="province" class="form-control {{$errors->has('province')?'is-invalid' : ""}}" type="text">
                        <label for="">Province</label>
                        @if($errors->has('province'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('province')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col">
                        <input value="{{ old('country') }}" name="country" class="form-control {{$errors->has('country')?'is-invalid' : ""}}" type="text">
                        <label for="">Country</label>
                        @if($errors->has('country'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('country')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col">
                        <input value="{{ old('zip') }}" name="zip" class="form-control" type="number">
                        <label for="">Zip Code</label>
                    </div>

                </div>
            </div>

            <div class="sub-enrollment-banner">
            <h3>Parents/Guardian's Information</h3>
            </div>
            <div style="padding: 35px" class="container">
                <div  class="row">
                    <div class="col">
                        <input value="{{ old('fatherName') }}" name="fatherName" class="form-control {{$errors->has('fatherName')?'is-invalid' : ""}}" type="text" placeholder="First Name, Middle Name, Last Name">
                        <label for="">Father's Name</label>
                        @if($errors->has('fatherName'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('fatherName')}}</strong>
                            </div>

                        @endif
                    </div>


                    <div class="col">
                        <input value="{{ old('motherName') }}"  name="motherName" class="form-control {{$errors->has('motherName')?'is-invalid' : ""}}" type="text" placeholder="First Name, Middle Name, Last Name">
                        <label for="">Mother's Name</label>
                        @if($errors->has('motherName'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('motherName')}}</strong>
                            </div>

                        @endif
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <input value="{{ old('guardianName') }}" name="guardianName" class="form-control {{$errors->has('guardianName')?'is-invalid' : ""}}" type="text" placeholder="First Name, Middle Name, Last Name">
                        <label for="">Guardian's Name</label>
                        @if($errors->has('guardianName'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('guardianName')}}</strong>
                            </div>

                        @endif
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <input value="{{ old('parentCpNo') }}" name="parentCpNo" class="form-control {{$errors->has('parentCpNo')?'is-invalid' : ""}}" type="number" >
                        <label for="">Cellphone No.</label>
                        @if($errors->has('parentCpNo'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('parentCpNo')}}</strong>
                            </div>

                        @endif
                    </div>


                    <div class="col">
                        <input value="{{ old('parentTpNo') }}" name="parentTpNo" class="form-control" type="number">
                        <label for="">Telephone No.</label>
                    </div>

                </div>


            </div>

            <div class="sub-enrollment-banner">
            <h3>FOR RETURNING LEARNERS('Balik-Aral') and THOSE WHO SHALL TRANSFER/MOVE IN</h3>
            </div>

            <div style="padding: 35px" class="container">
                <div class="row">
                    <div class="col">
                        <input value="{{ old('lastGrade') }}" name="lastGrade" class="form-control" type="text">
                        <label for="">Last Grade Level Completed</label>
                    </div>

                    <div class="col">
                        <input value="{{ old('lastSchoolYear') }}" name="lastSchoolYear" class="form-control" type="text">
                        <label for="">Last School Year Completed</label>
                    </div>

                    <div class="col">
                        <input value="{{ old('lastSchoolId') }}" name="lastSchoolId" class="form-control" type="number">
                        <label for="">School Id</label>
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <input value="{{ old('lastSchool') }}" name="lastSchool" class="form-control" type="text">
                        <label for="">School Name</label>
                    </div>

                    <div class="col">
                        <input  value="{{ old('lastSchoolAddress') }}" name="lastSchoolAddress" class="form-control" type="text">
                        <label for="">School Address</label>
                    </div>
                    
                </div>
            </div>
            <div class="sub-enrollment-banner">
            <h3>For Learners in SENIOR HIGH SCHOOL</h3>
            </div>
            <div style="padding: 35px" class="container">

                <div class="row">

                    <div class="col-lg-3">
                        <label for="">Grade Level:</label>
                        <select class="{{$errors->has('gradeLevel')?'is-invalid' : ""}}" name="gradeLevel" id="gradeLevel">
                            <option value="" selected disabled hidden>Choose here</option>
                            @foreach($levels as $level)

                                <option value="{{$level->id}}" @if (old('gradeLevel') == "$level->name") {{ 'selected' }}@endif >{{$level->name}}</option>
                                @endforeach

                        </select>
                        @if($errors->has('gradeLevel'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('gradeLevel')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col-lg-3">
                        <label for="">Semester:</label>
                        <select class="{{$errors->has('semester')?'is-invalid' : ""}}"  name="semester" id="semester">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="1st" @if (old('semester') == "1st") {{ 'selected' }} @endif>1st Semester</option>
                            <option value="2nd" @if (old('semester') == "2nd") {{ 'selected' }} @endif>2nd Semester</option>
                        </select>
                        @if($errors->has('semester'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('semester')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col-lg-3">
                        <label for="">Track:</label>
                        <select  class="{{$errors->has('track')?'is-invalid' : ""}}" name="track" id="track-selector">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option  value="Academic" @if (old('track') == "Academic") {{ 'selected' }} @endif>Academic</option>
                            <option value="Technical-Vocational Livelihood" @if (old('track') == "Technical-Vocational Livelihood") {{ 'selected' }} @endif>Technical-Vocational Livelihood</option>
                        </select>
                        @if($errors->has('track'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('track')}}</strong>
                            </div>

                        @endif
                    </div>
                </div>


                    <div style="margin-top: 100px" class="row">
                    <div class="col academic-strand">
                        <label for="">Strand:</label>
                        <select class="{{$errors->has('strand')?'is-invalid' : ""}} strand" name="strand">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="(ABM) Accountancy,Business And Management" @if (old('strand') == "(ABM) Accountancy,Business And Management") {{ 'selected' }} @endif>(ABM) Accountancy,Business And Management</option>
                            <option value="(HUMSS) Humanities and Social Studies" @if (old('strand') == "(HUMSS) Humanities and Social Studies") {{ 'selected' }} @endif>(HUMSS) Humanities and Social Studies</option>
                            <option value="(STEM) Science, Techonological, Engineering and Mathematics" @if (old('strand') == "(HUMSS) Humanities and Social Studies") {{ 'selected' }} @endif>(STEM) Science, Techonological, Engineering and Mathematics</option>
                        </select>
                        @if($errors->has('strand'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('strand')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col technical-strand">
                        <label for="">Strand:</label>
                        <select class="{{$errors->has('strand')?'is-invalid' : ""}} strand-1"  name="strand" >
                            <option value="" selected disabled hidden>Choose here</option>
                            <optgroup label="(HE) Home Economics">
                                <option value="(BC) Beauty Care" @if (old('strand') == "(BC) Beauty Care") {{ 'selected' }} @endif>(BC) Beauty Care</option>
                                <option value="(GT) Garments Technology" @if (old('strand') == "(GT) Garments Technology") {{ 'selected' }} @endif>(GT) Garments Technology</option>
                                <option value="(FPS) Food Products Servicing" @if (old('strand') == "(FPS) Food Products Servicing") {{ 'selected' }} @endif>(FPS) Food Products Servicing</option>
                                <option value="(HRS) Hotel & Restaurant Servicing" @if (old('strand') == "(HRS) Hotel & Restaurant Servicing") {{ 'selected' }} @endif>(HRS) Hotel & Restaurant Servicing</option>
                            </optgroup>

                            <optgroup label="(ICT) Information And Communication Technology">
                                <option value="(CSS) Computer System Servicing" @if (old('strand') == "(CSS) Computer System Servicing") {{ 'selected' }} @endif>(CSS) Computer System Servicing</option>
                                <option value="(TDA) Technical Drafting and Animation" @if (old('strand') == "(TDA) Technical Drafting and Animation") {{ 'selected' }} @endif>(TDA) Technical Drafting and Animation</option>
                            </optgroup>

                            <optgroup label="(IA) Industrial Arts">
                                <option value="(ATS) Automotive Servicing" @if (old('strand') == "(ATS) Automotive Servicing") {{ 'selected' }} @endif>(ATS) Automotive Servicing</option>
                                <option value="(EIM) Electrical Installation And Maintenance" @if (old('strand') == "(EIM) Electrical Installation And Maintenance") {{ 'selected' }} @endif>(EIM) Electrical Installation And Maintenance</option>
                                <option value="(EPAS) Electornic Products Assembly and Servicing" @if (old('strand') == "(EPAS) Electornic Products Assembly and Servicing") {{ 'selected' }} @endif>(EPAS) Electornic Products Assembly and Servicing</option>
                                <option value="(RAC) Refrigiration and Air-conditioning Servicing" @if (old('strand') == "(RAC) Refrigiration and Air-conditioning Servicing") {{ 'selected' }} @endif>(RAC) Refrigiration and Air-conditioning Servicing</option>
                            </optgroup>

                        </select>
                        @if($errors->has('strand'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('strand')}}</strong>
                            </div>

                        @endif
                    </div>
                    </div>
                </div>


        <div class="container justify-content-center">
            <div class="row offset-4">

            <button id="submit" class="btn btn-success col-lg-5" type="button">Submit</button>
                <button style="display: none;"  id="submit1" class="btn btn-success col-lg-5" type="submit">Submit</button>
            </div>

        </div>

        <div id="preview_data" title="Preview Form Data" style="display:none;"></div>


    </form>








</div>




<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $( document ).ready(function() {
        $("#track-selector").change(function () {
            if($(this).val() == "Academic"){
                $(".academic-strand").show().prop('disabled',false);
                $(".technical-strand").hide().prop('disabled',true);
                $(".strand-1").val('');
            }else if($(this).val()=="Technical-Vocational Livelihood"){
                $(".technical-strand").show().prop('disabled',false);
                $(".academic-strand").hide().prop('disabled',true);
                $(".strand").val('');
            }else{
                $(".academic-strand").hide();
                $(".technical-strand").hide();
            }
        });
    });


</script>


<script type= "text/javascript">
    $(document).ready( function() {
        $('#submit').on('click', function() {
            preview();
        });
    });





    function submit_form() {

        $('#form-enlist').submit();
    }


    function preview() {
        var firstName = $('input[name="firstName"]').val();
        var middleName = $('input[name="middleName"]').val();
        var lastName = $('input[name="lastName"]').val();
        var extName = $('input[name="extName"]').val();

        var basic_info_1 = '<p><span style="font-weight: bold;font-size: 1.2em;">Name:&nbsp;  </span>' + firstName + " " + middleName + " " + lastName + " " + extName + '</p>';

        var dob = $('input[name="dob"]').val();

        var sex_option =$('#sexValue option:selected').val();

        var sex = "";
        if(sex_option == "1"){
            sex = "Male";
        }else{
            sex ="Female";
        }





        var religion = $('input[name="religion"]').val();
        var indigenous = $('input[name="indigenous"]').val();
        var mothertongue = $('input[name="mothertongue"]').val();

        var basic_info_2 = '<p><strong style="font-weight: bold;font-size: 1.2em;" >Date of birth: </strong>' + dob + '</p>';
        var basic_info_3 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Sex: </strong>' + sex + '</p>';
        var basic_info_4 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Religion: </strong>' + religion + '</p>';
        var basic_info_5 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Group: </strong>' + indigenous + '</p>';
        var basic_info_6 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Group: </strong>' + mothertongue + '</p>';


        var lrnStatus = $('input[name="lrnStatus"]').val();
        var lrnNo = $('input[name="lrnNo"]').val();
        var psaNo = $('input[name="psaNo"]').val();
        var schoolYear1 = $('input[name="schoolYear1"]').val();
        var schoolYear2 = $('input[name="schoolYear1"]').val();

        var basic_info_7 = '<p><strong style="font-weight: bold;font-size: 1.2em;">School Year: </strong>' + schoolYear1 + " - " + schoolYear2 + '</p>';
        var basic_info_8 = '<p><strong style="font-weight: bold;font-size: 1.2em;">LRN: </strong>' + lrnStatus + '</p>';
        var basic_info_9 = '<p><strong style="font-weight: bold;font-size: 1.2em;">LRN No.: </strong>' + lrnNo + '</p>';
        var basic_info_10 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Psa No.: </strong>' + psaNo + '</p>';



       var street = $('input[name="street"]').val();
       var barangay = $('input[name="barangay"]').val();
       var municipality =  $('input[name="municipality"]').val();
       var province = $('input[name="province"]').val();
       var country = $('input[name="country"]').val();
       var houseNumber =  $('input[name="houseNumber"]').val();
       var zip =  $('input[name="zip"]').val();

        var basic_info_11 = '<p><strong style="font-weight: bold;font-size: 1.2em;">House No.: </strong>' + houseNumber + '</p>';
        var basic_info_12 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Street: </strong>' + street + '</p>';
        var basic_info_13 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Barangay: </strong>' + barangay + '</p>';
        var basic_info_14 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Municipality: </strong>' + municipality + '</p>';
        var basic_info_15 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Province: </strong>' + province + '</p>';
        var basic_info_16 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Country: </strong>' + country + '</p>';
        var basic_info_17 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Zip code: </strong>' + zip + '</p>';





       var fatherName =  $('input[name="fatherName"]').val();
       var motherName = $('input[name="motherName"]').val();
       var guardianName = $('input[name="guardianName"]').val();
       var parentCpNo =  $('input[name="parentCpNo"]').val();
       var parentTpNo = $('input[name="parentTpNo"]').val();

        var basic_info_18 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Father Name: </strong>' + fatherName + '</p>';
        var basic_info_19 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Mother Name: </strong>' + motherName + '</p>';
        var basic_info_20 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Guardian Name: </strong>' + guardianName + '</p>';
        var basic_info_21 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Cp No: </strong>' + parentCpNo + '</p>';
        var basic_info_22 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Tp No: </strong>' + parentTpNo + '</p>';




       var lastGrade = $('input[name="lastGrade"]').val();
       var lastSchoolYear = $('input[name="lastSchoolYear"]').val();
       var lastSchoolId = $('input[name="lastSchoolId"]').val();
       var lastSchool = $('input[name="lastSchool"]').val();
       var lastSchoolAddress = $('input[name="lastSchoolAddress"]').val();

        var basic_info_23 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Last grade: </strong>' + lastGrade + '</p>';
        var basic_info_24 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Last school year: </strong>' + lastSchoolYear + '</p>';
        var basic_info_25 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Last school ID no.: </strong>' + lastSchoolId + '</p>';
        var basic_info_26 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Last school name: </strong>' + lastSchool + '</p>';
        var basic_info_27 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Address: </strong>' + lastSchoolAddress + '</p>';




       var gradeLevel_option = $('#gradeLevel option:selected').val();
       var gradeLevel = "";
        if(gradeLevel_option == 1 ){
            gradeLevel = "Grade 11";
        }else if(gradeLevel_option == 2){
            gradeLevel = "Grade 12";
        }


       var semester_option = $('#semester option:selected').val();
        var semester = "";

        if(semester_option == "1st" ){
            semester = '1st';
        }else if (semester_option == "2nd"){
            semester = '2nd';
        }

        var track_option = $('#track-selector option:selected').val();
        var track = '';

        if(track_option == 'Academic'){
            track = "Academic";
        }else if(track_option == "Technical-Vocational Livelihood"){
            track = "Technical-Vocational Livelihood";
        }

        var strand_selector;

        if(!$('.strand-1').val()){
             strand_selector = $('.strand option:selected').val();
        }else if(!$('.strand').val()){
            strand_selector = $('.strand-1 option:selected').val();
        }


        var strand = "";

        if(strand_selector == "(ABM) Accountancy,Business And Management" )
        {
            strand = "(ABM) Accountancy,Business And Management"
        }else if(strand_selector == "(HUMSS) Humanities and Social Studies")
        {
            strand = "(HUMSS) Humanities and Social Studies";

        }else if(strand_selector == "(STEM) Science, Techonological, Engineering and Mathematics")
        {
            strand = "(STEM) Science, Techonological, Engineering and Mathematics";
        }else if(strand_selector == "(BC) Beauty Care")
        {
            strand = "(BC) Beauty Care";
        }else if(strand_selector == "(GT) Garments Technology")
        {
            strand ="(GT) Garments Technology";
        }else if(strand_selector == "(FPS) Food Products Servicing")
        {
            strand ="(FPS) Food Products Servicing";
        }else if(strand_selector == "(HRS) Hotel & Restaurant Servicing")
        {
            strand="(HRS) Hotel & Restaurant Servicing";
        }else if(strand_selector == "(CSS) Computer System Servicing")
        {
            strand="(CSS) Computer System Servicing";
        }else if(strand_selector == "(TDA) Technical Drafting and Animation")
        {
            strand ="(TDA) Technical Drafting and Animation";
        }else if(strand_selector == "(ATS) Automotive Servicing")
        {
            strand ="(ATS) Automotive Servicing";
        }else if(strand_selector == "(EIM) Electrical Installation And Maintenance")
        {
            strand ="(EIM) Electrical Installation And Maintenance";
        }else if(strand_selector == "(EPAS) Electornic Products Assembly and Servicing")
        {
            strand ="(EPAS) Electornic Products Assembly and Servicing";
        }else if(strand_selector == "(RAC) Refrigiration and Air-conditioning Servicing")
        {
            strand ="(RAC) Refrigiration and Air-conditioning Servicing";
        }





        var basic_info_28 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Grade: </strong>' + gradeLevel + '</p>';
        var basic_info_29 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Semester: </strong>' + semester + '</p>';
        var basic_info_30 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Track: </strong>' + track + '</p>';
        var basic_info_31 = '<p><strong style="font-weight: bold;font-size: 1.2em;">Strand: </strong>' + strand + '</p>';



        var data = basic_info_1 + basic_info_2 + basic_info_3 + basic_info_4 + basic_info_5 + basic_info_6 + basic_info_7 +
                   basic_info_8 + basic_info_9 + basic_info_10 + basic_info_11 + basic_info_12 + basic_info_13 + basic_info_14 +
                   basic_info_15 + basic_info_16 + basic_info_17 + basic_info_18 + basic_info_19 + basic_info_20 + basic_info_21 +
                   basic_info_22 + basic_info_23 + basic_info_24 + basic_info_25 + basic_info_26 + basic_info_27 + basic_info_28 +
                   basic_info_29 + basic_info_30 + basic_info_31;

        $('#preview_data').html('');
        $('#preview_data').append(data);

        var form = $('#form-enlist');

       $('#preview_data').dialog({
            resizable: false,
            height:500,
            width:500,
            modal: true,
            buttons: {
                Submit: function() {
                    //submit the form

                   $('#submit1').trigger('click');


                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            }
        });
    }


</script>

</body>
</html>