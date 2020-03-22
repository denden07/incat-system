@extends('layouts.teacherHome')

@section('section-status')

    active
@endsection

@section('subject-schedules-add-status')
    active
@endsection

@section('title')
    Add Subject | Admin
@endsection

@section('css')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
@endsection
@section('contents')


    <div class="add-subject-body">
        <h5>Create Subject Schedules</h5>

        <form  name="add_subject" id="add_subject" action="{{route('admin.subject.schedule.save')}}" method="post">
            @csrf
            @include('layouts._message')
            <table class="table table-bordered" id="dynamic_field">

                <tr id="row1">


                    {{--<td>--}}
                        {{--<label for="subjectCode">Subject Code </label>--}}
                        {{--<select name="subjCode[]" id="subjCode" class="dynamic" data-dependent="subject">--}}
                            {{--<option value="" selected disabled hidden>Choose here</option>--}}
                            {{--<option value="">none</option>--}}
                            {{--@foreach($subjects as $subject)--}}
                                {{--<option value="{{$subject->id}}">{{$subject->subjCode}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}


                    <td>  <label for="subject">Subject </label>
                        <select name="subject[]" id="subject"  class="dynamic" data-dependent="subjCode">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="">none</option>
                            @if($subjects)
                            @foreach($subjects as $subject)
                                @if(!empty($subject->level->name))
                                <option value="{{$subject->id}}">{{$subject->title ." - ". $subject->level->name}} </option>
                                    @elseif(empty($subject->level->name))
                                        <option value="{{$subject->id}}">{{$subject->title}} </option>
                                    @endif
                            @endforeach
                                @endif
                        </select></td>

                    @csrf
                    <td>  <label for="teacher">Teacher</label>
                        <select name="teacher[]" id="">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="">none</option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach

                        </select></td>

                    <td>
                        <label for="section">Section</label>
                        <select name="section[]" id="">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="">none</option>
                            @foreach($sections as $section)
                                <option value="{{$section->id}}">{{$section->name}} -  {{$section->level->name}} - {{$section->strand->name}}</option>
                            @endforeach

                        </select>
                    </td>

                    <td>
                        <label for="section">Schedule</label>

                        <input type="text" placeholder="M-W-F 10:00am-10:00pm" name="schedule[]">
                    </td>

                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                </tr>


            </table>

            <button type="submit">Submit</button>
        </form>


    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var i=1;
            $('#dynamic_field').on("click","#add" ,function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'">   <td>  <label for="subject">Subject </label>\n' +
                    '                        <select name="subject[]" >\n' +
                    '                            <option value="" selected disabled hidden>Choose here</option>\n' +
                    '                            <option value="">none</option>\n' +
                       ' @if($subjects)\n' +
                          '      @foreach($subjects as $subject)\n' +
                            '    @if(!empty($subject->level->name))\n' +
                    '                                <option value="{{$subject->id}}">{{$subject->title ." - ". $subject->level->name}}</option>\n' +
                       ' @elseif(empty($subject->level->name))\n' +
                   ' <option value="{{$subject->id}}">{{$subject->title}} </option>\n'+
                                        '@endif\n'+
                    '                            @endforeach\n' +
                    '                            @endif\n' +
                    '                        </select></td>\n' +
                    '\n' +
                    '                    <td>  <label for="teacher">Teacher</label>\n' +
                    '                        <select name="teacher[]" id="">\n' +
                    '                            <option value="" selected disabled hidden>Choose here</option>\n' +
                    '                            <option value="">none</option>\n' +
                    '                            @foreach($teachers as $teacher)\n' +
                    '                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>\n' +
                    '                            @endforeach\n' +
                    '\n' +
                    '                        </select></td>\n' +
                    '\n' +
                    '                    <td>\n' +
                    '                        <label for="section">Section</label>\n' +
                    '                        <select name="section[]" id="">\n' +
                    '                            <option value="" selected disabled hidden>Choose here</option>\n' +
                    '                            <option value="">none</option>\n' +
                    '                            @foreach($sections as $section)\n' +
                    '                                <option value="{{$section->id}}">{{$section->name}} -  {{$section->level->name}} - {{$section->strand->name}}</option>\n' +
                    '                            @endforeach\n' +
                    '\n' +
                    '                        </select>\n' +
                    '                    </td>\n' +
                    '\n' +
                    '                    <td>\n' +
                    '                        <label for="section">Schedule</label>\n' +
                    '\n' +
                    '                        <input type="text" placeholder="M-W-F 10:00am-10:00pm" name="schedule[]">\n' +
                    '                    </td>\n' +
                    '\n' +
                    '                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });


            // $('#submit').click(function(){
            //     $.ajax({
            //         url:"name.php",
            //         method:"POST",
            //         data:$('#add_name').serialize(),
            //         success:function(data)
            //         {
            //             alert(data);
            //             $('#add_name')[0].reset();
            //         }
            //     });
            // });

        });
    </script>

    {{--<script>--}}
        {{--$(document).ready(function(){--}}

            {{--$('.dynamic').change(function(){--}}
                {{--if($(this).val() != '')--}}
                {{--{--}}
                    {{--var select = $(this).attr("id");--}}
                    {{--var value = $(this).val();--}}
                    {{--var dependent = $(this).data('dependent');--}}
                    {{--var _token = $('input[name="_token"]').val();--}}
                    {{--$.ajax({--}}
                        {{--url:"{{ route('admin.subject.fetch') }}",--}}
                        {{--method:"POST",--}}
                        {{--data:{select:select, value:value, _token:_token, dependent:dependent},--}}
                        {{--success:function(result)--}}
                        {{--{--}}
                            {{--$('#'+dependent).html(result);--}}
                        {{--}--}}

                    {{--})--}}
                {{--}--}}
            {{--});--}}

            {{--$('#subjCode').change(function(){--}}
                {{--$('#subject').val('');--}}

            {{--});--}}

            {{--$('#subject').change(function(){--}}
                {{--$('#subjCode').val('');--}}
            {{--});--}}


        {{--});--}}
    {{--</script>--}}
@endsection