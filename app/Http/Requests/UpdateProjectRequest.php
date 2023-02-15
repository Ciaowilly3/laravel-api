<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'min:5|max:50',
            'description' =>'string',
            'cover_img' =>'image',
            'git_link' =>'url',
            "type_id" => "nullable|exists:types,id",
            'technologies' =>'nullable|array|exists:technologies,id'
        ];
    }
    public function messages() {
        return [
            "name.min" =>  "Il nome deve avere almeno :min caratteri",
            "name.max" =>  "Il nome deve avere massimo :max caratteri",
            "cover_img.image" => "L'immagine deve essere caricata",
            "git_link.url" => "Il link deve essere un URL",
            "type_id" => "come hai fatto a selezionare un'opzione inesistente?!"
        ];
    }
}
