<?php

namespace App\Http\Requests\Flyers;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street'  => 'required',
            'city'    => 'required',
            'country' => 'required',
            'zip'     => 'required|max:8',
            'state'   => 'required',
            'price'   => 'required|integer',
            'description' => 'required|min:10'
        ];
    }
}
