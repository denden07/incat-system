@extends('layouts.teacherHome')

@section('section-status')

    active
@endsection

@section('subject-add-status')
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
        <h5>Create Subject</h5>

        <form  name="add_subject" id="add_subject" action="{{route('admin.subject.save')}}" method="post">
            @csrf
            @include('layouts._message')
        <table class="table table-bordered" id="dynamic_field">

            <tr>
                <td>  <label for="subjCode">Subject Code:</label>
                    <input type="text" name="subjCode[]"></td>

                <td> <label for="title">Subject Name: </label>
                    <input type="text" name="title[]"></td>


                <td>  <label for="level_id">Grade: </label>
                    <select name="level_id[]" >
                        <option value="" selected disabled hidden>Choose here</option>
                        @foreach($levels as $level)
                            <option value="{{$level->id}}">{{$level->name}}</option>
                        @endforeach
                    </select></td>

                <td>   <label for="strand_id">Strand</label>
                    <select name="strand_id[]" id="">
                        <option value="">none</option>
                        @foreach($strands as $strand)
                            <option value="{{$strand->id}}">{{$strand->name}}</option>
                        @endforeach

                    </select></td>



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
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"> <td>  <label for="subjCode">Subject Code:</label>\n' +
                    '                    <input type="text" name="subjCode[]"></td>\n' +
                    '\n' +
                    '                <td> <label for="title">Subject Name: </label>\n' +
                    '                    <input type="text" name="title[]"></td>\n' +
                    '\n' +
                    '\n' +
                    '                <td>  <label for="level_id">Grade: </label>\n' +
                    '                    <select name="level_id[]" id="" >\n' +
                    '                        <option value="" selected disabled hidden>Choose here</option>\n' +
                    '                        @foreach($levels as $level)\n' +
                    '                            <option value="{{$level->id}}">{{$level->name}}</option>\n' +
                    '                        @endforeach\n' +
                    '                    </select></td>\n' +
                    '\n' +
                    '                <td>   <label for="strand_id">Strand</label>\n' +
                    '                    <select name="strand_id[]" id="">\n' +
                    '                        <option value="" selected disabled hidden>Choose here</option>\n' +
                    '                        <option value="">none</option>\n' +
                    '                        @foreach($strands as $strand)\n' +
                    '                            <option value="{{$strand->id}}">{{$strand->name}}</option>\n' +
                    '                        @endforeach\n' +
                    '\n' +
                    '                    </select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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
    @endsection