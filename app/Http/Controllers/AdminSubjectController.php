<?php

namespace App\Http\Controllers;

use App\Level;
use App\Schedule;
use App\Section;
use App\Strand;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

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

    public function createSubject(Request $request)
    {


        $levels = Level::all();
        $strands = Strand::all();





        return view('admin.subject.create',compact('levels','strands'));
    }

    public function storeSubject(Request $request)
    {
//        $subject = new Subject();
        $input = $request->all();
        $count = count($request->input('title'));


        for($i=0; $i<= $count;$i++){
            if(empty($input['title'][$i]) || !is_string($input['title'][$i])) continue;
            $data = [
                'subjCode' => $input['subjCode'][$i],
                'title' => $input['title'][$i],
                'level_id' => $input['level_id'][$i],
                'strand_id'=> $input['strand_id'][$i],
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

        return view('admin.subject.subjectList');
    }


    public function subjectSchedule()
    {

        $subjects = Subject::all();
        $teachers = Teacher::all()->where('status','active');
        $sections = Section::all()->where('status','active');

        return view('admin.subject.subjectSchedule',compact('subjects','teachers','sections'));
    }

    public function saveSubjectSchedule(Request $request)
    {

        $input = $request->all();
        $count = count($request->input('subject'));


        for($i=0; $i<= $count;$i++){
            if(empty($input['subject'][$i]) || !is_string($input['subject'][$i])) continue;
            $data = [
                'subject_id' => $input['subject'][$i],
                'teacher_id' => $input['teacher'][$i],
                'section_id' => $input['section'][$i],
                'schedule'=> $input['schedule'][$i],
                'status'=> "active",
            ];
            Schedule::create($data);

        }

        return "congrats!";

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
