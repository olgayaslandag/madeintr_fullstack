<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                "id" => "required|exists:users,id",
            ],
            'POST' => [
                "name" => "required|max:255",
                "email" => "required|max:100|email|unique:users,email",
                "rank_id" => "required|integer",
                "password" => "nullable|min:8|max:12"
            ],
            default => [],
        };
    }
}
