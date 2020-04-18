<?php

namespace App\Http\Controllers;

use App\Level;
use App\Section;
use App\Strand;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class AdminSectionController extends Controller
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




    public function createSection($year,$quarter)
    {

        $teachers = Teacher::all();
        $levels = Level::all();
        $strands = Strand::all();

        return view('admin.sections.create',compact('teachers','levels','strands','year','quarter'));
    }

    public function storeSection(Request $request)
    {
        $input = $request->all();
        $count = count($request->input('name'));



        for ($i=0;$i<=$count;$i++)
        {
          if(!empty($input['strand_id'][$i]))
        {
          $strand = $input['strand_id'][$i];
        }else
          {
              null;
          }
            if(empty($input['name'][$i]) || !is_string($input['name'][$i])) continue;
            $data = [
                'name' =>$input['name'][$i],
                'year' => $input['year'][$i],
                'teacher_id' =>$input['teacher_id'][$i],
                'level_id' =>$input['level_id'][$i],
                'strand_id' =>$strand,
                'status' => 'active',
            ];
            Section::create($data);
        }

        return redirect()-> route('admin.section.add')->with('success','Section(s) has been created');
    }

    public function sectionList($year,$quarter)
    {

        $sections = Section::all();


        return view('admin.sections.sectionList',compact('sections','year','quarter'));
    }

    public function sectionShow($section_id,$grade_id,$strand_id,$year,$quarter)
    {

        $section = Section::find($section_id);
        $strand = Strand::findOrFail($strand_id);
        $students = Student::all()->where('gradeLevel',$grade_id)->where('strand',$strand_id)->where('status','enrolled')->pluck('name','id');


        return view('admin.sections.sectionShow',compact('section','students','year','quarter'));
    }

    public function sectionPrint($section_id,$grade_id,$strand_id)
    {

        $section = Section::find($section_id);
        $strand = Strand::findOrFail($strand_id);
        $students = Student::all()->where('gradeLevel',$grade_id)->where('strand',$strand_id)->where('status','enrolled')->pluck('name','id');


        return view('admin.sections.sectionShow',compact('section','students'));
    }


    public function addStudentToSection(Request $request ,$section_id)
    {
        $section = Section::findOrFail($section_id);
        $section->save();

        if(isset($request->students)){
            $section->students()->sync($request->students,true);
        }else{
            $section->students()->sync(array());
        }


        return back()->with('success','Changes has been saved');
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
