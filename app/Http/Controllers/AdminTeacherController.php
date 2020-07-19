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


    public function editTeacher($teahcer_id,$year,$quarter)
    {
        $teacher = Teacher::findOrFail($teahcer_id);
        $user = User::where('teacher_id',$teahcer_id)->first();

        return view('admin.teacher.edit',compact('year','quarter','teacher','user'));
    }

    public function updateTeacher($teahcer_id, Request $request)
    {
        $teacher = Teacher::findOrFail($teahcer_id);

        if ($request->input('user.password') == '' ){
            $input = $request->except('user.password');
        } else {
            $input = $request->all();
            $input['user.password'] = bcrypt($request->input('user.password'));
        }

//        $input = $request->all();
//
//
        $teacher->update($input);

        $user = User::where('teacher_id',$teahcer_id)->first();

        if($request->input('user.password') == '')
        {
            $user->update(['name' => $request->input('user.name'),
                            'email'=>$request->input('user.email'),

            ] );
        }else{
            $user->update(['name' => $request->input('user.name'),
                'password'=>$input['user.password'],
                'email'=>$request->input('user.email'),
            ] );
        }




//
        return back()->with('success','Teacher successfully updated');
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
        $teacher->vocational = $request->vocational;
        $teacher->postGraduate = $request->postGraduate;
        $teacher->marital = $request->marital;
        $teacher->position = $request->position;
        $teacher->employee_id = $request->employee_id;
        $teacher->station_id = $request->station_id;
        $teacher->umid_id = $request->umid_id;
        $teacher->phil_health = $request->phil_health;
        $teacher->pag_ibig = $request->pag_ibig;
        $teacher->gsis_id = $request->gsis_id;
        $teacher->prc_id = $request->prc_id;
        $teacher->date_appointed = $request->date_appointed;

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
