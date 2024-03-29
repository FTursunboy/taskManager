<?php

namespace App\Http\Requests;

use App\Enums\Statuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:25'],
            'status' => ['required', Rule::enum(Statuses::class)],
            'date' => ['required', 'date_format:d.m.Y'],
            'description' => ['nullable']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
