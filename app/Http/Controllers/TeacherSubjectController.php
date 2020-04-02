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


    public function __construct()
    {
        $this->middleware('teacher');
    }


    public function mySubjectList()
    {
        $id = auth()->user();
        $id = $id->teacher_id;

        $teacher = Teacher::find($id)->id;


        $schedules = Schedule::all()->where('teacher_id',$teacher);


        return view('teacher.subject.allSubjectList',compact('teacher','schedules'));
    }

    public function mySubjectListActive()
    {

        $id = auth()->user();
        $id = $id->teacher_id;

        $teacher = Teacher::find($id)->id;


        $schedules = Schedule::all()->where('teacher_id',$teacher)->where('status','active');


        return view('teacher.subject.myActiveSubjectList',compact('teacher','schedules'));
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

        $grades =Grade::all()->where('subject_id',$schedule->id);


        return view('teacher.subject.studentList',compact('schedule','grades'));
    }


    public function gradeStudent(Request $request ,$schedule)
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
                'subject_id'=>$input['subject_id'][$i]
            ];
            Grade::create($data);

        }

        Schedule::find($schedule)->update(['is_editable'=>'yes']);



        return redirect()->route('teacher.mysubject.student.show',['subject_id'=>$schedule])->with('success','Grades successfully submitted');
    }

    public function updateGradeStudentShow(Request $request, $schedule_id)
    {
        $input = $request->all();
        $count = count($request->input('first'));


        for ($i = 0; $i <= $count; $i++) {
            if (empty($input['first'][$i]) || !is_numeric($input['first'][$i])) continue;
            $student = $input['student_id'][$i];
            Grade::where('subject_id',$schedule_id)->where('student_id',$student)->update(  [
                'first' => $input['first'][$i],
                'second' => $input['second'][$i],
                'third' => $input['third'][$i],
                'fourth' => $input['fourth'][$i],
                'student_id' => $input['student_id'][$i],
                'subject_id'=>$input['subject_id'][$i]
            ]);


        }


        return redirect()->route('teacher.mysubject.student.show',['subject_id'=>$schedule_id])->with('success','Grades successfully submitted');
    }


    public function editGradeStudent($schedule_id)
    {


        $schedule = Schedule::findOrFail($schedule_id);
        $grades =Grade::all()->where('subject_id',$schedule_id);

        return view('teacher.subject.editGrade',compact('schedule','grades'));
    }

    public function updateGradeStudent(Request $request, $subject)
    {
        $input = $request->all();
        $count = count($request->input('first'));


        for ($i = 0; $i <= $count; $i++) {
            if (empty($input['first'][$i]) || !is_numeric($input['first'][$i])) continue;
            $student = $input['student_id'][$i];
            Grade::where('subject_id',$subject)->where('student_id',$student)->update(  [
                'first' => $input['first'][$i],
                'second' => $input['second'][$i],
                'third' => $input['third'][$i],
                'fourth' => $input['fourth'][$i],
                'student_id' => $input['student_id'][$i],
                'subject_id'=>$input['subject_id'][$i]
            ]);


        }


        return redirect()->route('teacher.mysubject.student.show.edit',['subject_id'=>$subject]);
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
