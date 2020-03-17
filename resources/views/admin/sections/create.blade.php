@extends('layouts.teacherHome')

@section('section-status')

    active
@endsection

@section('section-add-status')
    active
@endsection

@section('title')
    Add Section | Admin
@endsection

@section('css')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
@endsection

@section('contents')


        <div class="add-section-body">
            <h5>Create Section</h5>


            <div class="add-section-form">
                <form action="{{route('admin.section.save')}}" method="post">
                    @csrf
                    @include('layouts._message')
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>
                                <label for="name">Section Name</label>
                                <input type="text" name="name[]">
                            </td>

                            <td>
                                <label for="year">Year</label>
                                <input type="text" name="year[]">
                            </td>

                            <td>
                                <label for="teacher_id">Adviser</label>
                                <select name="teacher_id[]" id="">
                                    <option value="" selected disabled hidden>Choose Teacher</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                </select>
                            </td>

                            <td>
                                <label for="level_id">Grade</label>
                                <select name="level_id[]" id="">
                                    <option value="" selected disabled hidden>Choose Grade</option>
                                    @foreach($levels as $level)
                                    <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                </select>
                            </td>

                            <td>
                                <label for="strand_id">Strand</label>
                                <select name="strand_id[]" id="">
                                    <option value="" selected disabled hidden>Choose Strand</option>
                                    @foreach($strands as $strand)
                                    <option value="{{$strand->id}}">{{$strand->name}}</option>
                                        @endforeach
                                </select>
                                
                            </td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>
                    <button type="submit">Submit</button>
                </form>
            </div>

        </div>


    
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'">  <td>\n' +
                    '                                <label for="name">Section Name</label>\n' +
                    '                                <input type="text" name="name[]">\n' +
                    '                            </td>\n' +
                    '\n' +
                    '                            <td>\n' +
                    '                                <label for="year">Year</label>\n' +
                    '                                <input type="text" name="year[]">\n' +
                    '                            </td>\n' +
                    '\n' +
                    '                            <td>\n' +
                    '                                <label for="teacher_id">Teacher</label>\n' +
                    '                                <select name="teacher_id[]" id="">\n' +
                    '                                    <option value="" selected disabled hidden>Choose Teacher</option>\n' +
                    '                                    @foreach($teachers as $teacher)\n' +
                    '                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>\n' +
                    '                                        @endforeach\n' +
                    '                                </select>\n' +
                    '                            </td>\n' +
                    '\n' +
                    '                            <td>\n' +
                    '                                <label for="level_id">Grade</label>\n' +
                    '                                <select name="level_id[]" id="">\n' +
                    '                                    <option value="" selected disabled hidden>Choose Grade</option>\n' +
                    '                                    @foreach($levels as $level)\n' +
                    '                                    <option value="{{$level->id}}">{{$level->name}}</option>\n' +
                    '                                        @endforeach\n' +
                    '                                </select>\n' +
                    '                            </td>\n' +
                    '\n' +
                    '                            <td>\n' +
                    '                                <label for="strand_id">Strand</label>\n' +
                    '                                <select name="strand_id[]" id="">\n' +
                    '                                    <option value="" selected disabled hidden>Choose Strand</option>\n' +
                    '                                    @foreach($strands as $strand)\n' +
                    '                                    <option value="{{$strand->id}}">{{$strand->name}}</option>\n' +
                    '                                        @endforeach\n' +
                    '                                </select>\n' +
                    '                                \n' +
                    '                            </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            $('#submit').click(function(){
                $.ajax({
                    url:"name.php",
                    method:"POST",
                    data:$('#add_name').serialize(),
                    success:function(data)
                    {
                        alert(data);
                        $('#add_name')[0].reset();
                    }
                });
            });

        });
    </script>

    @endsection