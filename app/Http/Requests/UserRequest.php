<?php

namespace App\Http\Requests;

use App\Enums\Statuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:25'],
            'login' => ['required', 'min:3', 'max:25'],
            'password' => ['required', 'confirmed']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
