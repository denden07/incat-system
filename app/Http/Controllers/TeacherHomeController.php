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
    public function index()
    {
        //


        return view('teacher.home.index');
    }

}