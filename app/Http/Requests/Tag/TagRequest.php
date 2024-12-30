<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        return match ($this->method()) {
            'DELETE' => [
                "id" => "required|exists:tags,id",
            ],
            'POST' => [
                "name" => "required|max:255",
                "id" => "nullable|exists:tags,id"
            ],
            default => [],
        };
    }
}
