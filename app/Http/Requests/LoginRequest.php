<?php

namespace App\Http\Requests;

use App\Enums\Statuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required', 'min:3', 'max:25', 'exists:users,login'],
            'password' => ['required', 'current_password:api']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
