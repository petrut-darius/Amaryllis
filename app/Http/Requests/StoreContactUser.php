<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactUser extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:30",
            "email" => "required|email|min:8|max:30",
            "phone" => "required|string|digits_between:10,12",
            "subject" => "required|string|min:10|max:50",
            "event_date" => "nullable|string|max:50",
            "terms_accepted_at" => "boolean",
            "vision" => "nullable|string|max:500",
            "message" => "required|string|max:500",
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            "event_date" => $this->eventDate,
        ]);
    }
}
