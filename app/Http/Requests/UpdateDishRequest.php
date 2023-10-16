<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:70',
            'ingredients'=>'required',
            'description'=>'required',
            'price'=>'required|regex:/^\d{1,2}(\.\d{1,2})?$/',
            'available'=>'required|boolean',
            'image'=>'nullable|url|max:2048',
            'restaurant_id'=>'required|exists:restaurants,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name'=>'Il campo è obbligatorio e può contenere al massimo 70 caratteri',
            'ingredients'=>'Questo campo è obbligatorio',
            'description'=>'La descrizione è obbligatoria',
            'price'=>'Il campo è oblligatorio e deve essere un numero compreso tra 1 e 99,99',
            'available'=>'Questo campo è obbligatorio',
            'image'=>'Questo campo può contenere un URL con un massimo di 2048 caratteri',
            'restaurant_id'=>'Questo campo è obbligatorio'
            
        ];

       
    }
}
