<?php

namespace App\Http\Controllers;

use App\Section;
use App\Setting;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function __construct()
//    {
//        $this->middleware('admin');
//    }


    public function landing()
    {
        $settings = Setting::all();



        return view('admin.home.landing',compact('settings'));
    }

    public function index($year,$quarter)
    {
        //

        $setting = Setting::where('sy',$year)->first();
        $students =Student::where('status','enrolled')->get();
        $teachers = Teacher::where('status','active')->get();
        $sections = Section::where('year',$year)->get();


        return view('admin.home.index',compact('year','setting','quarter','students','teachers','sections'));
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
