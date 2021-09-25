<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
          'profile-name' => 'required|min:2|max:16',
          'profile-email' => 'required|min:2|max:16',
          'profile-phone' => 'required|min:2|max:16'
        ];
    }
}
