<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


//    public function __construct()
//    {
//        $this->middleware('teacher');
//    }

    public function index()
    {
        //
        $id = auth()->user();



        return view('teacher.home.index',compact('id'));
    }

}