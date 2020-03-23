<?php

namespace App\Http\Controllers;

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
        $count = count($request->input('subject'));


        for ($i = 0; $i <= $count; $i++) {
            if (empty($input['subject'][$i]) || !is_string($input['subject'][$i])) continue;
            $data = [
                'subject_id' => $input['subject'][$i],
                'teacher_id' => $input['teacher'][$i],
                'section_id' => $input['section'][$i],
                'schedule' => $input['schedule'][$i],
                'status' => "active",
            ];
            Schedule::create($data);

        }
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
