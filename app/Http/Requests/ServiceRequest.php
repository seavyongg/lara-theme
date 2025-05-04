<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'image' => 'required|string|max:255',
            'color' => 'required|string|max:7',
            'order' => 'required|integer|unique:services,order,' . $this->route('service'),
        ];
    }
}
