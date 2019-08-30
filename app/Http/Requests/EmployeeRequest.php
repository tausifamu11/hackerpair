<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeRequest extends Request
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
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'employee_id' => 'required',
            'mob' => 'required|numeric',
            'position' => 'required',
            'salary' => 'required',
            'image' => 'required'
        ];
    }

    public function messages(){

        return [
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Valid Email',
            'gender.required' => 'Please Select Your Gender',
            'employee_id.required' => 'Please Enter Your Employee_id',
            'mob.required' => 'Please Enter Your Mobile Number',
            'mob.numeric' => 'Mobile Number Must be Numeric',
            'position.required' => 'Please Enter Your Position',
            'salary.required' => 'Please Enter Your Salary',
            'image.required' => 'Please Select Your image'
        ];
    }
}
