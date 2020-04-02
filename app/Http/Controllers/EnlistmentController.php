<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnlistmentRequest;
use App\Level;
use App\Strand;
use App\Student;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class EnlistmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $students = new Student();
        $levels = Level::all();
        $strands1 = Strand::all()->where('track_id',1);
        $strands2 = Strand::all()->where('track_id',2)->where('sub_cat','(HE) Home Economics');
        $strands3 = Strand::all()->where('track_id',2)->where('sub_cat','(ICT) Information And Communication Technology');
        $strands4 = Strand::all()->where('track_id',2)->where('sub_cat','(IA) Industrial Arts');


        return view('public.enrollmentForm',compact('students','levels','strands1','strands2','strands3','strands4'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnlistmentRequest $request)
    {
        //

        $students =  new Student();

        $students->lastName = $request->lastName;
        $students->firstName = $request->firstName;
        $students->middleName = $request->middleName;
        $students->extName = $request->extName;
        $students->dob = $request->dob;
        $students->sex = $request->sex;
        $students->age = $request->age;
        $students->religion	= $request->religion;
        $students->indigenous = $request->indigenous;
        $students->mothertongue = $request->mothertongue;
        $students->lrnStatus= $request->lrnStatus;
        $students->lrnNo = $request->lrnNo;
        $students->psaNo = $request->psaNo;
        $students->schoolYear1 =$request->schoolYear1;
        $students->schoolYear12 =$request->schoolYear2;
        $students ->address = $request->houseNumber . ", " . $request->street .", ". $request->barangay .", " . $request->municipality .", ". $request->province .", ". $request->country . ", ". $request->zip;
        $students-> fatherName	= $request->fatherName;
        $students-> motherName	= $request->motherName;
        $students->guardianName	 = $request->guardianName;
        $students->parentCpNo = $request->parentCpNo;
        $students->parentTpNo = $request->parentTpNo;
        $students->lastGrade =$request->lastGrade;
        $students->lastSchoolYear =$request->lastSchoolYear;
        $students->lastSchoolId = $request->lastSchoolId;
        $students->lastSchool = $request->lastSchool;
        $students->lastSchoolAddress = $request->lastSchoolAddress;
        $students->gradeLevel = $request->gradeLevel;
        $students->semester = $request->semester;
        $students->track = $request->track;
        $students->strand = $request->strand;
        $students->status = "enlisted";

        $students->save();

        return redirect()->route('public.enlistment.create')->with('success',"Congrats you have been enlisted");




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
