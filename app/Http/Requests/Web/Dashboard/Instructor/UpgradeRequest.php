<?php

namespace App\Http\Requests\Web\Dashboard\Instructor;

use Illuminate\Foundation\Http\FormRequest;

class UpgradeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  => ['string','required' ,'min:1' ,'max:200'],
            'email'                 => ['email','required'],
            'phone'                 => ['numeric','required', 'min:10','unique:users,phone'],
            'whatsapp'              => ['numeric','required', 'min:10', 'unique:users,whatsapp'],
            'facebook'              => ['string','required', 'unique:users,facebook'],
            'city'                  => ['required'],
            'country'               => ['required'],
            'area'                  => ['required'],
            'specializatin'        => ['required'],

        ];
    }

   
}
