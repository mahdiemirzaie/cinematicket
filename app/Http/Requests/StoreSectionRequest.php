<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'from'=>'required|min:1|max:24',
            'to'=>'required|min:1|max:24',
            'cinema_id'=> ["required","numeric","exists:cinemas,id"],
            'movie_id'=> ["required","numeric","exists:cinemas,id"],
        ];
    }
}
