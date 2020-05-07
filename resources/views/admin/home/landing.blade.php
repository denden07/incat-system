<!doctype html>
<html>
<head>
<title>
    Select Date
</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
    body{
        background:#2e8b57;
    }





    </style>
</head>





<body>

<div class="option-card-body ">

<div class="year-card-body">
    <div class="year-card-title">
        Select School Year
    </div>

    <table>

        <button style="margin-left: 10px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus-circle"></i></button>

        <th>School Year</th>
        <th>Status</th>
        <th>Action</th>

        <tbody>
        @foreach($settings as $setting)
        <tr>
            <div style="display: none">
            @if($setting->firstQ == "active")
                {{$quarter = "1st"}}
            @elseif($setting->secondQ == "active")
                {{$quarter ="2nd"}}
            @elseif($setting->thirdQ == "active")
                {{$quarter ="3rd"}}
            @elseif($setting->fourthQ == "active")
                {{$quarter ="3rd"}}
            @endif
            </div>
            <td><a href="{{route('admin.dashboard.index',['year'=>$setting->sy,'quarter'=>$quarter])}}">{{$setting->sy}}</a></td>

            <td>{{$setting->status}}</td>
            <td><a href="{{route('change.sy.status',['id'=>$setting->id])}}">Change Status</a>  </td>
            @endforeach
        </tbody>
    </table>

</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New School Year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.newsy.save')}}" method="post">
                @csrf
            <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">School: Year</label>
                        <input type="text" class="form-control" id="recipient-name" name="sy">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>




</body>








</html>