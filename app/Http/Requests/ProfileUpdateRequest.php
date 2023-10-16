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
}
