<?php

namespace App\Http\Controllers;

use App\Level;
use App\Student;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
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


    public function enlistment()
    {

        $students = Student::all()->where('status','enlisted');
        $gradeLevel = Level::all();
        $levels = $gradeLevel->sortBy('name')->pluck('name')->unique();

        return view('admin.student.enlistment',compact('students','levels'));
    }


    public function delete($student_id)
    {
        $studen = Student::where('id',$student_id)->where('status','enlisted');

        $studen->delete();
    }

    public function bulkDelete(Request $request){

        $students = $request->input('checkboxEnlistment');

        $studen = Student::whereIn('id',$students)->where('status','enlisted');




        switch ($request->input('action')){
            case 'delete':
                $studen->delete();
                return redirect()->route('admin.student.enlistment')->with('fail',"Students has been deleted");
                break;

            case  'update':
                $studen->update(['status'=>'enrolled']);
                return redirect()->route('admin.student.enlistment')->with('success',"Students has been enrolled");
                break;
        }
    }


    public function studentList()
    {
        $student = Student::find(25);
        $students = Student::all()->where('status','enrolled');
        $gradeLevel = Level::all();
        $levels = $gradeLevel->sortBy('name')->pluck('name')->unique();
        return view('admin.student.studentList',compact('students','levels','student'));
    }

    public function studentShow($student_id)
    {
       $student = Student::where('id',$student_id)->where('status','enrolled')->first();

        return view('admin.student.studentShow',compact('student'));
    }


    public function enrollmentFormDocs($student_id){
        $student = Student::findOrFail($student_id)->first();
//
//        $phpWord = new \PhpOffice\PhpWord\PhpWord();
//
//        $newSection = $phpWord->addSection();
//
//
//        $desc1 = " I am" . $student->name ." ". "nice to meet you";
//
//        $newSection->addText($desc1);
//
//        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
//        try{
//            $objectWriter->save(storage_path('TestWordFile.docx'));
//        }catch (\Exception $e){}
//
//        return response()->download(storage_path('TestWordFile.docx'));


        return view('admin.student.enlistmentForm',compact('student'));
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
