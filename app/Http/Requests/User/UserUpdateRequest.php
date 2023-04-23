<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'image' => ['image','mimes:jpg,png,jpeg,webp','max:1024'],
            'name'  => ['required'],
            'status'=> ['required'],
            'role_name'  => ['required'],
            'birth' => ['required'],
            'gender'=> ['required']
        ];
    }
}
