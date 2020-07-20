

<html>
<link  href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/printEnroleeData.css') }}" rel="stylesheet" media="print">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">


<body>
<div class="enrollment-data">
    <div class="enrollment-data-banner">
        <h3>TOTAL NUMBER OF ENROLEES</h3>
        <h4>SCHOOL YEAR {{$year}}</h4>
        @if($setting->firstS == "active")

            <h4>FIRST SEMESTER</h4>
        @else
            <h4>SECOND SEMESTER</h4>
        @endif
    </div>

@if($record)
<div class="enrollment-data-table">
    <table>
        <thead>
        <th>GRADE LEVEL</th>
        <th>MALE</th>
        <th>FEMALE</th>
        <th>TOTAL</th>
        </thead>

        <tbody>
        <tr>
            <td>GRADE 11</td>
            <td>{{$record->grade_11_m}}</td>
            <td>{{$record->grade_11_f}}</td>
            <td>{{$record->grade_11_t}}</td>
        </tr>

        <tr>
            <td>GRADE 12</td>
            <td>{{$record->grade_12_m}}</td>
            <td>{{$record->grade_12_f}}</td>
            <td>{{$record->grade_12_t}}</td>
        </tr>

        <tr>
            <td>OVERALL TOTAL</td>
            <td>{{$record->grade_total_m}}</td>
            <td>{{$record->grade_total_f}}</td>
            <td>{{$record->strand_total}}</td>
        </tr>
        </tbody>
    </table>

</div>


<div style="margin-top: 3%" class="enrollment-data-by-strand-banner">
    <h3>NUMBER OF ENROLEES</h3>
    <h4>SCHOOL YEAR {{$year}}</h4>
    @if($setting->firstS == "active")

        <h4>FIRST SEMESTER</h4>
    @else
        <h4>SECOND SEMESTER</h4>
    @endif
</div>



<div class="enrollment-data-table-1">
    <table style="width: 100%">
        <thead>
        <th>STRAND</th>
        <th>MALE</th>
        <th>FEMALE</th>
        <th>TOTAL</th>
        </thead>

        <tbody>
        <tr class="no-border-enrollee-data">
            <td>Academic</td>
        </tr>

        <tr>
            <td>(ABM) Accountancy,Business And Management</td>
            <td>{{$record->abm_t_m}}</td>
            <td>{{$record->abm_t_f}}</td>
            <td>{{$record->abm_t}}</td>
        </tr>

        <tr>
            <td>(HUMSS) Humanities and Social Studies</td>
            <td>{{$record->humss_t_m}}</td>
            <td>{{$record->humss_t_f}}</td>
            <td>{{$record->humss_t}}</td>
        </tr>

        <tr>
            <td>(STEM) Science, Techonological, Engineering and Mathematics	</td>
            <td>{{$record->stem_t_m}}</td>
            <td>{{$record->stem_t_f}}</td>
            <td>{{$record->stem_t}}</td>
        </tr>
        <tr  class="no-border-enrollee-data">
            <td>TECHNICAL VOCATIONAL LIVELIHOOD</td>
        </tr>

        <tr  class="no-border-enrollee-data">
            <td> HOME ECONOMICS</td>
        </tr>

        <tr>
            <td>(BC) Beauty Care</td>
            <td>{{$record->bc_t_m}}</td>
            <td>{{$record->bc_t_f}}</td>
            <td>{{$record->bc_t}}</td>
        </tr>

        <tr>
            <td>(GT) Garments Technology</td>
            <td>{{$record->gt_t_m}}</td>
            <td>{{$record->gt_t_f}}</td>
            <td>{{$record->gt_t}}</td>
        </tr>

        <tr>
            <td>(FPS) Food Products Servicing</td>
            <td>{{$record->fps_t_m}}</td>
            <td>{{$record->fps_t_f}}</td>
            <td>{{$record->fps_t}}</td>
        </tr>

        <tr>
            <td>(HRS) Hotel & Restaurant Servicing</td>
            <td>{{$record->hrs_t_m}}</td>
            <td>{{$record->hrs_t_f}}</td>
            <td>{{$record->hrs_t}}</td>
        </tr>

        <tr  class="no-border-enrollee-data">
            <td>INFORMATION AND COMMUNICATION TECHNOLOGY</td>
        </tr>

        <tr>
            <td>(CSS) Computer System Servicing</td>
            <td>{{$record->css_t_m}}</td>
            <td>{{$record->css_t_f}}</td>
            <td>{{$record->css_t}}</td>
        </tr>

        <tr>
            <td>(TDA) Technical Drafting and Animation</td>
            <td>{{$record->tda_t_m}}</td>
            <td>{{$record->tda_t_f}}</td>
            <td>{{$record->tda_t}}</td>
        </tr>


        <tr  class="no-border-enrollee-data">
            <td> Industrial Arts</td>
        </tr>
        <tr>
            <td>(ATS) Automotive Servicing</td>
            <td>{{$record->ats_t_m}}</td>
            <td>{{$record->ats_t_f}}</td>
            <td>{{$record->ats_t}}</td>
        </tr>

        <tr>
            <td>(EIM) Electrical Installation And Maintenance</td>
            <td>{{$record->eim_t_m}}</td>
            <td>{{$record->eim_t_f}}</td>
            <td>{{$record->eim_t}}</td>
        </tr>

        <tr>
            <td>(EPAS) Electornic Products Assembly and Servicing</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>(RAC) Refrigiration and Air-conditioning Servicing</td>
            <td>{{$record->rac_t_m}}</td>
            <td>{{$record->rac_t_f}}</td>
            <td>{{$record->rac_t}}</td>
        </tr>

        <tr class="footer-enrolle-data">
            <td>Over All Total</td>
            <td>{{$record->strand_t_m}}</td>
            <td>{{$record->strand_t_f}}</td>
            <td>{{$record->strand_total}}</td>
        </tr>


        </tbody>
    </table>

</div>
@endif
</div>
</body>

</html>