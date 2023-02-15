<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'name'=> 'required|min:3',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'il nome del tipo è richiesto',
            'name.min' => 'il nome del tipo deve avere minimo 3 caratteri',
            'description.required' => 'e describila sta descrizione, a tua discrezione'
        ];
    }
}
