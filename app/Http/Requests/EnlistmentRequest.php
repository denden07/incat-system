<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnlistmentRequest extends FormRequest
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
            'mothertongue' => 'required',
            'schoolYear1' => 'required|numeric',
            'schoolYear2' => 'required|numeric',
//            'address' => 'required',
            'gradeLevel' => 'required',
            'semester' => 'required',
            'track' => 'required',
            'strand' => 'required',
//            'status' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'country' => 'required',


            'fatherName' => 'required',
            'motherName' => 'required',
            'guardianName' => 'required',
            'parentCpNo' => 'required|numeric',


        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
           'dob.required' => 'Date of birth is required',
            'parentCpNo.required' => "Parent's number is required",
            'schoolYear1.required' => "Enter a year",
            'schoolYear2.required' => "Enter a year",
            'lastName.required' => "Last Name is required",
            'firstName.required' => "First Name is required",
            'middleName.required' => "Middle Name is required",
            'sex.required' => "Sex is required",
            'age.required' => "Age is required",
            'mothertongue.required' => "Preferred language is required",

            "street.required" => "Street is required",
            "barangay.required" => "Barangay is required",
            "municipality.required" => "Municipality is required",
            "province.required" => "Province is required",
            "country.required" => "Country is required",

            "fatherName.required" => "Father's name is required",
            "motherName.required" => "Mother's name is required",
            "guardianName.required" => "Guardian's name is required",


            "gradeLevel.required" => "Choose grade level",
            "semester.required" => "Choose semester",
            "track.required" => "Choose track",
            "strand.required" => "Choose Strand",




        ];
    }
}
