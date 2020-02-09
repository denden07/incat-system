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


    <form  action="">
        <div class="form-group">
            <div class="sub-enrollment-banner">
            <h3 style="text-align: center;margin-top: 15px">Basic Education Enrollment Form</h3>
            </div>
            <div class="row justify-content-center student-status" >

        <div class="col-lg-4  school-year-holder">
            <div class="row">
                <p class="school-year-year" >School Year:</p>
                <div class="col-lg-3">
                <input style="height: 60%" type="text" class="form-control year-input" >
                </div>
                <p> - </p>
                <div class="col-lg-3">
                 <input style="height: 60%"   type="text" class="form-control year-input" >
                </div>
            </div>
        </div>

                <div class="col-lg-3 lrn-holder">
                    <div class="row">
                <div class="col-lg-3">
                    <p class="lrn-title">Lrn ?</p>
                </div>


                <div class="col-lg-1">
                    <input id="lrn-yes" type="radio" class="form-check-input" value="1">
                    <label for="lrn-yes">Yes</label>
                </div>

                <div class="col-lg-1 offset-1">
                    <input id="lrn-no" type="radio" class="form-check-input" value="0">
                    <label for="lrn-no">No</label>
                </div>
                    </div>
                </div>


                <div class="returning-holder col-lg-2">
                    <input type="checkbox" value="1" class="form-check-input" id="returning-checkbox">
                    <label for="returning-checkbox" class="returning-title form-check-label">Returning/Balik Aral?(check box if yes)</label>
                </div>


            </div>

            <div class="sub-enrollment-banner">
            <h3>Student Information</h3>
            </div>

            <div style="margin-top: 25px" class="container">

                <div class="row justify-content-center">
                <div  class="col-lg-4">


                    <input class="form-control" type="text">
                    <label>Psa Birth Certificate Number:</label>

                </div>

                <div class="col-lg-4">
                    <input  class="form-control" type="text">
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
                            <input  class="form-control" type="text">
                            <label for="">Last Name</label>
                        </div>

                        <div class="col">
                            <input  class="form-control" type="text">
                            <label for="">First Name</label>
                        </div>
                
                        <div class="col">
                            <input  class="form-control" type="text">
                            <label for="">Middle Name</label>
                        </div>
                
                        <div class="col">
                            <input  class="form-control" placeholder="eg. Jr. III(if applicable)" type="text">
                            <label for="">Extension Name</label>
                        </div>
                
                 </div>

                 </div>
             </div>
            </div>


            <div class="container">

            <div style="padding: 10px 40px" class="row justify-content-center">
                <div class="col">

                    <input   type="date">
                    <label for="">Date Of Birth</label>

                </div>

                <div class="col">
                    <label for="">Sex:</label>
                    <select name="" id="">
                        <option value="" selected disabled hidden>Choose here</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>

                <div class="col">

                    <input class="form-control" type="number">
                    <label for="">Age</label>
                </div>

                <div class="col">

                    <input class="form-control" type="text">
                    <label for="">Religion:</label>
                </div>

                <div class="col">

                    <input class="form-control"  type="text">
                    <label for="">Mother Tongue</label>
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
                        <input class="form-control" type="text" placeholder="If Yes, Please Specify">
                    </div>
                    </div>
                </div>


            </div>

            <div class="sub-enrollment-banner">
            <h3>Address</h3>
            </div>
            <div class="container">
                <div style="padding: 25px 45px" class="row justify-content-center">

                    <div class="col">
                        <input class="form-control" type="text">
                        <label for="">House Number and Street</label>
                    </div>

                    <div class="col">
                        <input class="form-control" type="text">
                        <label for="">Barangay</label>
                    </div>

                    <div class="col">
                        <input class="form-control" type="text">
                        <label for="">City/Municipality</label>
                    </div>

                    <div class="col">
                        <input class="form-control" type="text">
                        <label for="">Province and Country</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="number">
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
                        <input class="form-control" type="text" placeholder="First Name, Middle Name, Last Name">
                        <label for="">Father's Name</label>
                    </div>


                    <div class="col">
                        <input class="form-control" type="text" placeholder="First Name, Middle Name, Last Name">
                        <label for="">Mother's Name</label>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <input class="form-control" type="text" placeholder="First Name, Middle Name, Last Name">
                        <label for="">Guardian's Name</label>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <input class="form-control" type="number" >
                        <label for="">Cellphone No.</label>
                    </div>


                    <div class="col">
                        <input class="form-control" type="number">
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
                        <input class="form-control" type="text">
                        <label for="">Last Grade Level Completed</label>
                    </div>

                    <div class="col">
                        <input class="form-control" type="text">
                        <label for="">Last School Year Completed</label>
                    </div>

                    <div class="col">
                        <input class="form-control" type="number">
                        <label for="">School Id</label>
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <input class="form-control" type="text">
                        <label for="">School Name</label>
                    </div>

                    <div class="col">
                        <input class="form-control" type="text">
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
                        <label for="">Semester:</label>
                        <select name="" id="">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="1st">1st Semester</option>
                            <option value="2nd">2nd Semester</option>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="">Track:</label>
                        <select name="" id="track-selector">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="Academic">Academic</option>
                            <option value="Technical-Vocational Livelihood">Technical-Vocational Livelihood</option>
                        </select>
                    </div>


                    <div class="col academic-strand">
                        <label for="">Strand:</label>
                        <select name="" id="">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="Academic">(ABM) Accountancy,Business And Management</option>
                            <option value="Technical-Vocational Livelihood">(HUMSS) Humanities and Social Studies</option>
                            <option value="Technical-Vocational Livelihood">(STEM) Science, Techonological, Engineering and Mathematics</option>
                        </select>
                    </div>

                    <div class="col technical-strand">
                        <label for="">Strand:</label>
                        <select name="" id="">
                            <option value="" selected disabled hidden>Choose here</option>
                            <optgroup label="(HE) Home Economics">
                                <option value="">(BC) Beauty Care</option>
                                <option value="">(GT) Garments Technology</option>
                                <option value="">(FPS) Food Products Servicing</option>
                                <option value="">(HRS) Hotel & Restaurant Servicing</option>
                            </optgroup>

                            <optgroup label="(ICT) Information And Communication Technology">
                                <option value="">(CSS) Computer System Servicing</option>
                                <option value="">(TDA) Technical Drafting and Animation</option>
                            </optgroup>

                            <optgroup label="(IA) Industrial Arts">
                                <option value="">(ATS) Automotive Servicing</option>
                                <option value="">(EIM) Electrical Installation And Maintenance</option>
                                <option value="">(EPAS) Electornic Products Assembly and Servicing</option>
                                <option value="">(RAC) Refrigiration and Air-conditioning Servicing</option>
                            </optgroup>

                        </select>
                    </div>

                </div>

            </div>




    </form>








</div>




<script src="{{asset('js/app.js')}}"></script>


<script>
   $("#track-selector").change(function () {
        if($(this).val() == "Academic"){
            $(".academic-strand").show();
            $(".technical-strand").hide();
        }else if($(this).val()=="Technical-Vocational Livelihood"){
            $(".technical-strand").show();
            $(".academic-strand").hide();
       }else{
            $(".academic-strand").hide();
            $(".technical-strand").hide();
        }
   });
</script>

</body>
</html>