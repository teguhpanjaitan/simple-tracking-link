<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'   => ['required','string','max:120'],
            'email'  => ['required','email','max:190'],
            'gclid'  => ['nullable','string','max:190'],
            'sub_id' => ['nullable','string','max:190'],
        ];
    }
}
