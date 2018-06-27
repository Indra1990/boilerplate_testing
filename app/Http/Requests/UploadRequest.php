<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
        $rules = [
            'title' => 'required|min:3',
            'subject' => 'required|min:5',
        ];

        // $nbr = count($this->input('photos'))-1;
        //   foreach(range(0, $nbr) as $index) {
        //       $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        //   }

        return $rules;
    }
}
