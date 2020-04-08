<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Section;
use App\Student;
use Illuminate\Http\Request;

class TeacherSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('teacher');
    }


    public function mySectionList()
    {
        $id = auth()->user();
        $id = $id->teacher_id;

        $sections = Section::all()->where('teacher_id',$id);


        return view('teacher.section.allSectionList',compact('sections'));
    }

    public function mySectionListActive()
    {
        $id = auth()->user();
        $id = $id->teacher_id;


        $sections = Section::all()->where('teacher_id',$id)->where('status','active');
        return view('teacher.section.myActiveSection',compact('sections'));

    }

    public function mySectionListAction(Request $request)
    {
        $sections = $request->input('checkboxMySection');

        $section = Section::whereIn('id',$sections);




        switch ($request->input('action')){
            case 'inactive':
                $section->update(['status'=>'inactive']);
                return redirect()->route('teacher.mysection.all')->with('fail',"Section/s is inactive");
                break;

            case  'active':
                $section->update(['status'=>'active']);
                return redirect()->route('teacher.mysection.all')->with('success',"Section/s is active");
                break;
        }
    }

    public function mySectionListActiveAction(Request $request)
    {
        $sections = $request->input('checkboxMySection');

        $section = Section::whereIn('id',$sections);




        switch ($request->input('action')){
            case 'inactive':
                $section->update(['status'=>'inactive']);
                return redirect()->route('teacher.mysection.active')->with('fail',"Section/s is inactive");
                break;

            case  'active':
                $section->update(['status'=>'active']);
                return redirect()->route('teacher.mysection.active')->with('success',"Section/s is active");
                break;
        }
    }


    public function mySectionStudentList($year,$sectionName)
    {
        $section = Section::where('name',$sectionName)->first();






        return view('teacher.section.studentList',compact('section','year'));
    }

    public function mySectionShowStudent($year,$studentLrn)
    {

        $id = auth()->user();
        $id = $id->teacher_id;


        $student = Student::where('lrnNo',$studentLrn)->first();
        $grades1 = Grade::where('student_id',$student->id)->where('teacher_id',$id)->where('year',$year)->where('semester','1st')->get();
        $grades2 = Grade::where('student_id',$student->id)->where('teacher_id',$id)->where('year',$year)->where('semester','2nd')->get();


        return view('teacher.section.studentShow',compact('grades1','grades2','student'));
    }


    public function mySectionShowStudentFilter($year,$sem,$studentLrn)
    {

        $id = auth()->user();
        $id = $id->teacher_id;


        $student = Student::where('lrnNo',$studentLrn)->first();
        $grades = Grade::where('student_id',$student->id)->where('teacher_id',$id)->where('year',$year)->get();
    }





















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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
