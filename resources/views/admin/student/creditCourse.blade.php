@extends('layouts.teacherHome')

@section('title')
    Student List | Admin
@endsection


@section('student-status')

    active
@endsection

@section('student-list-status')
    active
@endsection

@section('css')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
@endsection

@section('contents')

    <div class="add-section-body">
        <h5>Create Section</h5>


        <div class="add-section-form">
            <form action="{{route('admin.student.credit.grade.save',['student_id'=>$studentId->id])}}" method="post">
                @csrf
                @include('layouts._message')
                <table class="table table-bordered" id="dynamic_field">
                    <tr>


                        <td>
                            <label for="subject_id">Subject Name</label>
                            <select name="subject_id[]" id="">
                                <option value="" selected disabled hidden>Choose Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->title}}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <label for="subjectT">Subject Taken</label>
                            <input type="text" name="subjectT[]">
                        </td>

                        <td>
                            <label for="final">Final Grade</label>
                            <input type="number" name="final[]">
                        </td>


                        <td>
                            <label for="sem">Semester</label>
                            <select name="sem[]" id="">
                                <option value=""  selected disabled hidden>Choose Here</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                            </select>
                        </td>

                        <td>
                            <label for="sy">Year Level</label>
                            <select name="sy[]" id="">
                                <option value=""  selected disabled hidden>Choose Here</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                            </select>
                        </td>



                        <td>
                            <label for="year">School Year</label>
                            <input type="text" name="year[]">
                        </td>




                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <button type="submit">Submit</button>
            </form>
        </div>

    </div>
@endsection

<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'">  <td>\n' +
                '                                      <label for="subject_id">Subject Name</label>\n' +
                '                            <select name="subject_id[]" id="">\n' +
                '                                <option value="" selected disabled hidden>Choose Subject</option>\n' +
                '                                @foreach($subjects as $subject)\n' +
                '                                    <option value="{{$subject->id}}">{{$subject->title}}</option>\n' +
                '                                @endforeach\n' +
                '                            </select>\n' +
                '                        </td>\n' +
                '\n' +
                '                        <td>\n' +
                '                            <label for="subjectT">Subject Taken</label>\n' +
                '                            <input type="text" name="subjectT[]">\n' +
                '                        </td>\n' +
                '\n' +
                '                        <td>\n' +
                '                            <label for="final">Final Grade</label>\n' +
                '                            <input type="number" name="final[]">\n' +
                '                        </td>\n' +
                '\n' +
                '\n' +
                '                        <td>\n' +
                '                            <label for="sem">Semester</label>\n' +
                '                            <select name="sem[]" id="">\n' +
                '                                <option value=""  selected disabled hidden>Choose Here</option>\n' +
                '                                <option value="1st">1st</option>\n' +
                '                                <option value="2nd">2nd</option>\n' +
                '                            </select>\n' +
                '                        </td>\n' +
                '\n' +
                '                        <td>\n' +
                '                            <label for="sem">Year Level</label>\n' +
                '                            <select name="sy[]" id="">\n' +
                '                                <option value=""  selected disabled hidden>Choose Here</option>\n' +
                '                                <option value="1st">1st</option>\n' +
                '                                <option value="2nd">2nd</option>\n' +
                '                            </select>\n' +
                '                        </td>\n' +
                '\n' +
                '\n' +
                '\n' +
                '                        <td>\n' +
                '                            <label for="year">School Year</label>\n' +
                '                            <input type="text" name="year[]">\n' +
                '                        </td>\n' +
                '\n' +
                '\n' +
                '\n' +
                '\n' +
                '                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>' +
                '                            <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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