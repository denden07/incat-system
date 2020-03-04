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

@section('contents')


        <div class="add-subject-body">
            <h5>Create Subject</h5>


            <div class="add-subject-form">
                <form action="">
                    <label for="subjCode"></label>
                    <input type="text" name="subjCode">


                </form>
            </div>

        </div>


    
@endsection