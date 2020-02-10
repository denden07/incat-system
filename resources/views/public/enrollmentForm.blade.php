<!DOCTYPE html>
<html>

<head>
<title>Enlistment Form</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body>

<div class="wrapper-enlistment">

    <div class="enlistment-banner container">
        <div class="row justify-content-center">

        <img class="col-lg-1" src="{{asset('images/logo/incat.png')}}" alt="">
        <h2 style="margin-left: -70px;margin-top: 10px" class="col-lg-5">Student Enlistment Form</h2>

        </div>
    </div>


    <form action="{{route('public-pre-enlistment.store')}}" method="post">
        @csrf
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
                    <select  class="{{$errors->has('sex')?'is-invalid' : ""}}" name="sex" id="">
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
                        <select class="{{$errors->has('gradeLevel')?'is-invalid' : ""}}" name="gradeLevel" id="">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="Grade 11" @if (old('gradeLevel') == "Grade 11") {{ 'selected' }} @endif>Grade 11</option>
                            <option value="Grade 12" @if (old('gradeLevel') == "Grade 12") {{ 'selected' }} @endif>Grade 12</option>
                        </select>
                        @if($errors->has('gradeLevel'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('gradeLevel')}}</strong>
                            </div>

                        @endif
                    </div>

                    <div class="col-lg-3">
                        <label for="">Semester:</label>
                        <select class="{{$errors->has('semester')?'is-invalid' : ""}}"  name="semester" id="">
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
                        <select class="{{$errors->has('strand')?'is-invalid' : ""}}" name="strand" id="">
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
                        <select class="{{$errors->has('strand')?'is-invalid' : ""}}"  name="strand" id="">
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

            <button class="btn btn-success col-lg-5" type="submit">Submit</button>
            </div>

        </div>

    </form>








</div>




<script src="{{asset('js/app.js')}}"></script>


<script>
    $( document ).ready(function() {
        $("#track-selector").change(function () {
            if($(this).val() == "Academic"){
                $(".academic-strand").show().prop('disabled',false);
                $(".technical-strand").hide().prop('disabled',true);
            }else if($(this).val()=="Technical-Vocational Livelihood"){
                $(".technical-strand").show().prop('disabled',false);
                $(".academic-strand").hide().prop('disabled',true);
            }else{
                $(".academic-strand").hide();
                $(".technical-strand").hide();
            }
        });
    });

</script>

</body>
</html>