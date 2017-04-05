<?php

namespace SA\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class inadimplenteRequest extends FormRequest
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
            'usuario' => 'required|max:255',
            'st_inadimplente' => 'required|max:1'
        ];
    }
}
