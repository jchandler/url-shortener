<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlFormRequest extends FormRequest
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
            'longUrl' => 'required|url',
        ];
    }

    /**
     * Custom messages for the user.
     *
     * @return array
     */
    public function messages()
    {
      return [
          'longUrl.required' => 'You must enter a URL.',
          'longUrl.url' => 'You must enter a valid URL. Remember to include "http://" or "https://" at the beginning.',
      ];
    }

}
