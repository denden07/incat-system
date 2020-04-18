<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherRequest;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminTeacherController extends Controller
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


    public function teacherList($year,$quarter)
    {


        $teachers = Teacher::all();

        return view('admin.teacher.teacherList',compact('teachers','year','quarter'));
    }


    public function addTeacher($year,$quarter)
    {


        return view('admin.teacher.create',compact('year','quarter'));
    }


    public function storeTeacher(CreateTeacherRequest $request)
    {

        $teacher = new Teacher();

        $teacher->lastName = $request->lastName;
        $teacher->firstName = $request->firstName;
        $teacher->middleName = $request->middleName;
        $teacher->sex = $request->sex;
        $teacher->dob = $request->dob;
        $teacher->age = $request->age;
        $teacher->address = $request->address;
        $teacher->religion = $request->religion;
        $teacher->mothertongue = $request->mothertongue;
        $teacher->expertise = $request->expertise;
        $teacher->contactNo	 = $request->contactNo;
        $teacher->course	 = $request->course;
        $teacher->yearGraduated	 = $request->yearGraduated;
        $teacher->lastSchoolTeached	 = $request->lastSchoolTeached;
        $teacher->status	 = "active";
        $teacher->lastSchoolAttended	 = $request->lastSchoolAttended;
        $teacher->award	 = $request->award;
        $teacher->extensionName	 = $request->extensionName;
        $teacher->nso	 = $request->nso;
        $teacher->transcript	 = $request->transcript;
        $teacher->let = $request->let;
        $teacher->prc = $request->prc;
        $teacher->coe = $request->coe;
        $teacher->certificates = $request->certificates;

        $teacher->save();

        $user = new User();
        $user->name = $request->username;
        $user->password = bcrypt(Input::get('password'));
        $user->teacher_id = $teacher->id;
        $user->role_id = 2;
        $user->email = $request->email;
        $user->save();

        return back()->with('success','Teacher has been added successfully');


    }

    public function teacherAction(Request $request){

        $teachers = $request->input('checkboxTeacher');

        $teacher = Teacher::whereIn('id',$teachers);




        switch ($request->input('action')){
            case 'inactive':
                $teacher->update(['status'=>'inactive']);
                return redirect()->route('admin.teacher.list')->with('fail',"Teacher/s is inactive");
                break;

            case  'active':
                $teacher->update(['status'=>'active']);
                return redirect()->route('admin.teacher.list')->with('success',"Teacher/s is active");
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
