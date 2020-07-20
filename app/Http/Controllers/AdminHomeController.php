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

        if($setting->firstS == "active")
        {
            $record = Record::where('sy',$year)->where('sem','1st')->first();

        }else
        {
            $record = Record::where('sy',$year)->where('sem','2nd')->first();
        }



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
            'gTwelves','gTwelvesM','gTwelvesF','record'));
    }


    public function generateEnrolleeRecord($year,$sem)
    {

        $g11T = Student::where('gradeLevel','1')->where('semester',$sem)->where('sy',$year)->get();
        $g11M = Student::where('gradeLevel','1')->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $g11F = Student::where('gradeLevel','1')->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();


        $g12T = Student::where('gradeLevel','2')->where('semester',$sem)->where('sy',$year)->get();
        $g12M = Student::where('gradeLevel','2')->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $g12F = Student::where('gradeLevel','2')->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $gA11Total = $g11T->count() + $g12T->count();
        $gAllTotalM = $g11M->count() + $g12M->count();
        $gAllTotalF = $g11F->count() + $g12F->count();

        $abm_t_m = Student::where('strand',1)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $abm_t_f = Student::where('strand',1)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $humss_t_m =  Student::where('strand',2)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $humss_t_f =  Student::where('strand',2)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();


        $stem_t_m =  Student::where('strand',3)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $stem_t_f =  Student::where('strand',3)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $bc_t_m =  Student::where('strand',4)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $bc_t_f =  Student::where('strand',4)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $gt_t_m=  Student::where('strand',5)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $gt_t_f =  Student::where('strand',5)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $fps_t_m =  Student::where('strand',6)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $fps_t_f =  Student::where('strand',6)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $hrs_t_m =  Student::where('strand',7)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $hrs_t_f =  Student::where('strand',7)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $css_t_m =  Student::where('strand',8)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $css_t_f =  Student::where('strand',8)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $tda_t_m =  Student::where('strand',9)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $tda_t_f =  Student::where('strand',9)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $ats_t_m =  Student::where('strand',10)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $ats_t_f =  Student::where('strand',10)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $eim_t_m =  Student::where('strand',11)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $eim_t_f =  Student::where('strand',11)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $epas_t_m =  Student::where('strand',12)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $epas_t_f =  Student::where('strand',12)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $rac_t_m =  Student::where('strand',13)->where('sex','Male')->where('semester',$sem)->where('sy',$year)->get();
        $rac_t_f =  Student::where('strand',13)->where('sex','Female')->where('semester',$sem)->where('sy',$year)->get();

        $recordSelector = Record::where('sy',$year)->where('sem',$sem)->first();

        if($recordSelector == null)
        {


        $record = new Record();

        $record->sy = $year;
        $record->sem = $sem;

        $record->grade_11_t = $g11T->count();
        $record->grade_11_m = $g11M->count();
        $record->grade_11_f = $g11F->count();

        $record->grade_12_t = $g12T->count();
        $record->grade_12_m = $g12M->count();
        $record->grade_12_f = $g12F->count();
        $record->grade_all_total = $gA11Total;
        $record->grade_total_m =$gAllTotalM;
        $record->grade_total_f =$gAllTotalF;

        $record->abm_t_m = $abm_t_m->count();
        $record->abm_t_f = $abm_t_f->count();
        $record->abm_t =  $abm_t_m->count() +  $abm_t_f->count();

        $record->humss_t_m = $humss_t_m->count();
        $record->humss_t_f = $humss_t_f->count();
        $record->humss_t = $humss_t_m->count() + $humss_t_f->count();

        $record->stem_t_m = $stem_t_m->count();
        $record->stem_t_f = $stem_t_f->count();
        $record->stem_t = $stem_t_m->count() + $stem_t_f->count();

        $record->bc_t_m = $bc_t_m->count();
        $record->bc_t_f = $bc_t_f->count();
        $record->bc_t =  $bc_t_m->count() +  $bc_t_f->count();

        $record->gt_t_m = $gt_t_m->count();
        $record->gt_t_f = $gt_t_f->count();
        $record->gt_t =   $gt_t_m->count() +  $gt_t_f->count();

        $record->fps_t_m = $fps_t_m->count();
        $record->fps_t_f = $fps_t_f->count();
        $record->fps_t =   $fps_t_m->count() +  $fps_t_f->count();

        $record->hrs_t_m = $hrs_t_m->count();
        $record->hrs_t_f = $hrs_t_f->count();
        $record->hrs_t =   $hrs_t_m->count() +  $hrs_t_f->count();

        $record->css_t_m = $css_t_m->count();
        $record->css_t_f= $css_t_f->count();
        $record->css_t =   $css_t_m->count() + $css_t_f->count();

        $record->tda_t_m = $tda_t_m->count();
        $record->tda_t_f = $tda_t_f->count();
        $record->tda_t =   $tda_t_m->count() + $tda_t_f->count();

        $record->ats_t_m = $ats_t_m->count();
        $record->ats_t_f = $ats_t_f->count();
        $record->ats_t =   $ats_t_m->count() + $ats_t_f->count();

        $record->eim_t_m = $eim_t_m->count();
        $record->eim_t_f = $eim_t_f->count();
        $record->eim_t =   $eim_t_m->count() + $eim_t_f->count();

        $record->epas_t_m  = $epas_t_m ->count();
        $record->epas_t_f  = $epas_t_f->count();
        $record->epas_t =   $epas_t_m->count() + $epas_t_f->count();

        $record->rac_t_m  = $rac_t_m ->count();
        $record->rac_t_f  = $rac_t_f->count();
        $record->rac_t =   $rac_t_m->count() + $rac_t_f->count();

        $record->strand_t_m = $gAllTotalM;
        $record->strand_t_f = $gAllTotalF;
        $record->strand_total = $gA11Total;



       $record->save();

        }



       if($recordSelector == null)
       {
           return redirect()->back()->with('success','Enrollment Data Generated');
       }else
       {
           return redirect()->back()->with('fail','Enrollment Data Already Exist');
       }





    }


    public function printEnrollmentData($year,$quarter)
    {
        $setting = Setting::where('sy',$year)->first();

        if($setting->firstS == "active")
        {
            $record = Record::where('sy',$year)->where('sem','1st')->first();

        }else
        {
            $record = Record::where('sy',$year)->where('sem','2nd')->first();
        }


        return view('admin.home.printEnrollmentData',compact('record','year','setting'));
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
