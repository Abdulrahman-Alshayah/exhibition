<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => 'required',
            "email" => 'required|email',
            "password" => 'required|confirmed|sometimes',
            "phone" => 'numeric|unique',
            'birthdate' => 'date|date_format:Y-m-d',
            "Gender" => 'integer|in:1,2',
            "company" => 'string',
            "commercial_registration" => 'string',
            "company_email" => 'email',
            "city" => 'string',
            "mobile_number" => 'numeric',
            "landline_number" => 'numeric',
            "website" => 'url',
            "facebook_page" => 'string',
            "whatsapp_number" => 'numeric',
            "contact_person" => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'password.sometimes' => trans('validation.sometimes'),
            'password.confirmed' => trans('validation.confirmed'),
            'Phone.required' => trans('validation.required'),
            'Phone.unique' => trans('validation.unique'),
            'Phone.numeric' => trans('validation.numeric'),
            'Date_Birth.required' => trans('validation.required'),
            'Date_Birth.date' => trans('validation.date'),
            'Gender.required' => trans('validation.required'),
            'Gender.integer' => trans('validation.integer'),
            'company.string' => trans('validation.string'),
            'commercial_registration.string' => trans('validation.string'),
            'company_email.email' => trans('validation.numeric'),
            'city.string' => trans('validation.string'),
            'mobile_number.numeric' => trans('validation.numeric'),
            'landline_number.numeric' => trans('validation.numeric'),
            'website.url' => trans('validation.numeric'),
            'facebook_page.string' => trans('validation.numeric'),
            'whatsapp_number.numeric' => trans('validation.numeric'),
            'contact_person.numeric' => trans('validation.numeric'),

        ];
    }
}
