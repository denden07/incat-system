<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Schedule;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function mySubjectList()
    {

        $teacher = Teacher::find(9)->id;


        $schedules = Schedule::all()->where('teacher_id',$teacher);


        return view('teacher.subject.allSubjectList',compact('teacher','schedules'));
    }

    public function mySubjectListAction(Request $request)
    {
        $subjects = $request->input('checkboxMySubject');

        $subject = Schedule::whereIn('id',$subjects);




        switch ($request->input('action')){
            case 'inactive':
                $subject->update(['status'=>'inactive']);
                return redirect()->route('teacher.mysubject.all')->with('fail',"Subject/s is inactive");
                break;

            case  'active':
                $subject->update(['status'=>'active']);
                return redirect()->route('teacher.mysubject.all')->with('success',"Subject/s is active");
                break;
        }
    }


    public function subjectStudentShow($schedule)
    {

        $schedule = Schedule::findOrFail($schedule);

        return view('teacher.subject.studentList',compact('schedule'));
    }


    public function gradeStudent(Request $request)
    {
        $input = $request->all();
        $count = count($request->input('first'));


        for ($i = 0; $i <= $count; $i++) {
            if (empty($input['first'][$i]) || !is_numeric($input['first'][$i])) continue;
            $data = [
                'first' => $input['first'][$i],
                'second' => $input['second'][$i],
                'third' => $input['third'][$i],
                'fourth' => $input['fourth'][$i],
                'student_id' => $input['student_id'][$i],
            ];
            Grade::create($data);

        }

        return "Success";
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
