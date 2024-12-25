<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                "id" => "required|exists:companies,id",
            ],
            'POST' => [
                "name" => "required|max:255",
                "webpage" => "required|max:100",
                "desc" => "required|max:255",
                "city_id" => "required|exists:cities,id",
            ],
            default => [],
        };
    }
}
