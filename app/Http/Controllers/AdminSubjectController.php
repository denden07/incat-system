<?php

namespace App\Http\Controllers;

use App\Level;
use App\Schedule;
use App\Section;
use App\Strand;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSubjectController extends Controller
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
    }

    public function createSubject(Request $request,$year,$quarter)
    {


        $levels = Level::all();
        $strands = Strand::all();


        return view('admin.subject.create', compact('levels', 'strands','year','quarter'));
    }

    public function subjectList(Request $request,$year,$quarter)
    {


       $subjects = Subject::all();


        return view('admin.subject.subjectList', compact('subjects','year','quarter'));
    }


    public function storeSubject(Request $request)
    {
//        $subject = new Subject();
        $input = $request->all();
        $count = count($request->input('title'));


        for ($i = 0; $i <= $count; $i++) {
            if (empty($input['title'][$i]) || !is_string($input['title'][$i])) continue;
            $data = [
                'subjCode' => $input['subjCode'][$i],
                'title' => $input['title'][$i],
                'level_id' => $input['level_id'][$i],
                'strand_id' => $input['strand_id'][$i],
            ];
            Subject::create($data);

        }

//        $subject->subjCode = $request->input('subjCode');
//        $subject->title = $request->input('title');
//        $subject->level_id = $request->input('level_id');
//        $subject->strand_id = $request->input('strand_id');
//
//
//
//        $subject->save();

        return back()->with('success', 'Subject(s) has been created!');
    }


    public function subjectSchedule($year,$quarter)
    {

        $subjects = Subject::all();
        $teachers = Teacher::all()->where('status', 'active');
        $sections = Section::all()->where('status', 'active');

        return view('admin.subject.subjectSchedule', compact('subjects', 'teachers', 'sections','quarter','year'));
    }

//
//    function fetch(Request $request)
//    {
//        $select = $request->get('select');
//        $value = $request->get('value');
//        $dependent = $request->get('dependent');
//        $data = DB::table('subjects')
//            ->where($select, $value)
//            ->groupBy($dependent)
//            ->get();
//        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
//        foreach($data as $row)
//        {
//            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
//        }
//        echo $output;
//    }

    public function saveSubjectSchedule(Request $request)
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

        return redirect()->route('admin.subject.schedule.create')->with('success', 'Subject schedule created!');

    }

    public function subjectScheduleList($year,$quarter)
    {
        $schedules = Schedule::all();

        return view('admin.subject.subjectScheduleList',compact('schedules','year','quarter'));
    }

    public function subjectUpdate(Request $request){

        $subject = $request->input('checkboxSchedule');

        $subjects = Schedule::whereIn('id',$subject);




        switch ($request->input('action')){
            case 'inactive':
                $subjects->update(['status'=>'inactive']);
                return redirect()->route('admin.subject.schedule.list')->with('fail',"Subject/s is inactive");
                break;

            case  'active':
                $subjects->update(['status'=>'active']);
                return redirect()->route('admin.subject.schedule.list')->with('success',"Subject/s is active");
                break;

            case 'delete':
                $subjects->delete();
                return redirect()->route('admin.subject.schedule.list')->with('fail',"Subject/s has been deleted");
                break;
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
