<?php

namespace App\Http\Requests;

use App\Enums\Statuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:25'],
            'date' => ['required', 'date_format:d.m.Y'],
            'description' => ['nullable']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
