<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:319', Rule::unique(User::class)->ignore($this->user()->id)],
            'restaurant_name'=>['required', 'max:255'],
            'address'=>['required', 'max:255'],
            'image'=>['nullable','image'],
            'p_iva'=>['required','min:11','max:11'],
            'categories' => 'nullable|array',
            'categories.*'=>'exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name' =>'Il campo Nome è obbligatorio.',
            'email.required' => 'Il campo Email è obbligatorio.',
            'email.email' => 'Il campo Email deve essere un indirizzo email valido.',
            'email.unique' => 'L\'indirizzo email specificato è già in uso.',
            'restaurant_name'=>'Il campo Nome del ristorante è obbligatorio.',
            'address'=>'Il campo Indirizzo è obbligatorio.',
            'image'=>'L\'immagine deve essere un file di immagine valido.',
            'p_iva.required' => 'Il campo Partita IVA è obbligatorio.',
            'p_iva.min' => 'Il campo Partita IVA deve contenere almeno 11 caratteri.',
            'p_iva.max' => 'Il campo Partita IVA non può superare 11 caratteri.',
            'categories.*'=>'Una delle categorie selezionate non esiste nel sistema.',
            
        ];
    }
}
