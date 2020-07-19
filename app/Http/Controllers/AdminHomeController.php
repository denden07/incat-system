<?php

namespace App\Http\Controllers;

use App\Record;
use App\Section;
use App\Setting;
use App\Strand;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

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

        $academics = Strand::where('sub_cat','Academic')->get();

        $gElevens = Student::where('gradeLevel','1')->get();
        $gElevensM = Student::where('gradeLevel','1')->where('sex','Male')->get();
        $gElevensF = Student::where('gradeLevel','1')->where('sex','Female')->get();

        $gTwelves = Student::where('gradeLevel','2')->get();
        $gTwelvesM = Student::where('gradeLevel','2')->where('sex','Male')->get();
        $gTwelvesF= Student::where('gradeLevel','2')->where('sex','Female')->get();


        return view('admin.home.index',compact('year','setting','quarter',
            'students','teachers','sections','academics',
            'gElevens','gElevensM','gElevensF',
            'gTwelves','gTwelvesM','gTwelvesF'));
    }


    public function generateEnrolleeRecord($year,$sem)
    {

        $grade11 = Student::where('gradeLevel','1')->get();
        $gElevensM = Student::where('gradeLevel','1')->where('sex','Male')->get();
        $gElevensF = Student::where('gradeLevel','1')->where('sex','Female')->get();

        $record = new Record();

        $record->sy = $year;
        $record->sem = $sem;
        $record->grade_11 = $grade11->count();
        $record->grade_11_m = $gElevensM->count();
        $record->grade_11_f = $gElevensF->count();

        dd($record);




    }

    public function changeQuarter1($year)
    {
        $quarter = Setting::where('sy',$year)->first();

        $quarter->update([


            'firstQ' => 'active',
            'secondQ' => 'inactive',
            'thirdQ'=> 'inactive',
            'fourthQ'=> 'inactive',

        ]);

        $quarter = "1st";
        return redirect()-> route('admin.dashboard.index',['year'=>$year,'quarter'=>$quarter]);
    }

    public function changeQuarter2($year)
    {
        $quarters = Setting::where('sy',$year)->first();



        $quarters->update([


            'firstQ' => 'inactive',
            'secondQ' => 'active',
            'thirdQ'=> 'inactive',
            'fourthQ'=> 'inactive',

        ]);

        $quarter = "2nd";
        return redirect()-> route('admin.dashboard.index',['year'=>$year,'quarter'=>$quarter]);
    }

    public function changeQuarter3($year)
    {
        $quarter = Setting::where('sy',$year)->first();

        $quarter->update([


            'firstQ' => 'inactive',
            'secondQ' => 'inactive',
            'thirdQ'=> 'active',
            'fourthQ'=> 'inactive',

        ]);

        $quarter = "3rd";
        return redirect()-> route('admin.dashboard.index',['year'=>$year,'quarter'=>$quarter]);
    }

    public function changeQuarter4($year)
    {
        $quarter = Setting::where('sy',$year)->first();

        $quarter->update([


            'firstQ' => 'inactive',
            'secondQ' => 'inactive',
            'thirdQ'=> 'inactive',
            'fourthQ'=> 'active',

        ]);

        $quarter = "4th";
        return redirect()-> route('admin.dashboard.index',['year'=>$year,'quarter'=>$quarter]);

    }



    public function changeSem1($year)
    {
        $quarter = Setting::where('sy',$year)->first();

        $quarter->update([


            'firstS'=>'active',
            'secondS'=>'inactive',
        ]);


        return back();
    }


    public function changeSem2($year)
    {
        $quarter = Setting::where('sy',$year)->first();

        $quarter->update([



            'firstS'=>'inactive',
            'secondS'=>'active',
        ]);


        return back();
    }

    public function createSY(Request $request)
    {
        $setting = new Setting();
        $setting->sy = $request->sy;
        $setting->firstQ = "active";
        $setting->secondQ = "inactive";
        $setting->thirdQ = "inactive";
        $setting->fourthQ= "inactive";
        $setting->firstS = "active";
        $setting->secondS ="inactive";
        $setting->status ="active";

        $setting->save();

        return back();

    }

    public function changeSyStatus($id)
    {
        $setting = Setting::findOrFail($id);

        if($setting->status == "active")
        {
            $setting->update(['status'=>'inactive']);
        }else
        {
            $setting->update(['status'=>'active']);
        }

        return back();
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
