<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //

            'lastName' => 'required',
            'firstName' => 'required',
            'middleName' => 'required',
            'dob' => 'required|date',
            'sex' => 'required',
            'age' => 'required',
            'contactNo' => 'required',
            'address' => 'required',
            'course' => 'required',
            'yearGraduated' => 'required',
            'lastSchoolAttended' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'lastName.required' => "Last Name is required",
            'firstName.required' => "First Name is required",
            'middleName.required' => "Middle Name is required",
            'dob.required' => 'Date of birth is required',
            'sex.required' => "Sex is required",
            'age.required' => "Age is required",
            'contactNo.required' => "Contact Number is required",
            'address.required' => "Address is required",
            'course.required' => "Course is required",
            'yearGraduated.required' => "Year Graduated is required",
            'lastSchoolAttended.required' => "School Attended is required",
        ];
    }
}
