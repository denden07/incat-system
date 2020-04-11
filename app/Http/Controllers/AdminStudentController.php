<?php

namespace App\Http\Controllers;

use App\Grade;
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

        $students = Student::all()->where('status', 'enlisted');
        $gradeLevel = Level::all();
        $levels = $gradeLevel->sortBy('name')->pluck('name')->unique();

        return view('admin.student.enlistment', compact('students', 'levels'));
    }


    public function delete($student_id)
    {
        $studen = Student::where('id', $student_id)->where('status', 'enlisted');

        $studen->delete();
    }

    public function bulkDelete(Request $request)
    {

        $students = $request->input('checkboxEnlistment');

        $studen = Student::whereIn('id', $students)->where('status', 'enlisted');


        switch ($request->input('action')) {
            case 'delete':
                $studen->delete();
                return redirect()->route('admin.student.enlistment')->with('fail', "Students has been deleted");
                break;

            case  'update':
                $studen->update(['status' => 'enrolled']);
                return redirect()->route('admin.student.enlistment')->with('success', "Students has been enrolled");
                break;
        }
    }


    public function studentList()
    {
        $student = Student::find(25);
        $students = Student::all()->where('status', 'enrolled');
        $gradeLevel = Level::all();
        $levels = $gradeLevel->sortBy('name')->pluck('name')->unique();
        return view('admin.student.studentList', compact('students', 'levels', 'student'));
    }

    public function studentShow($student_id)
    {
        $student = Student::where('id', $student_id)->where('status', 'enrolled')->first();

        return view('admin.student.studentShow', compact('student'));
    }


    public function enrollmentFormDocs($student_id)
    {
        $student = Student::findOrFail($student_id);
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


        return view('admin.student.enlistmentForm', compact('student'));
    }

    public function studentShowGrade($student_id)
    {
        $student = Student::find($student_id);
        $studentLrn = Student::find($student_id)->lrnNo;

        $grades1 = Grade::where('student_id', $student_id)->where('semester', '1st')->where('sy', '1st')->get();
        $grades2 = Grade::where('student_id', $student_id)->where('semester', '2nd')->where('sy', '1st')->get();
        $grades3 = Grade::where('student_id', $student_id)->where('semester', '1st')->where('sy', '2nd')->get();
        $grades4 = Grade::where('student_id', $student_id)->where('semester', '2nd')->where('sy', '2nd')->get();


        return view('admin.student.studentGrade', compact('grades1', 'grades2', 'grades3', 'grades4', 'student','student_id','studentLrn'));
    }

    public function studentPrintGrade($student_id,$sem,$sy)
    {

        $student = Student::where('lrnNo',$student_id)->first();
        $grades = Grade::where('student_id',$student->id)->where('semester',$sem)->where('sy',$sy)->get();
        $gradeYear = Grade::where('student_id',$student->id)->where('semester',$sem)->where('sy',$sy)->first();


        return view('admin.student.studentPrintGrade',compact('student','grades','sem','gradeYear'));
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
