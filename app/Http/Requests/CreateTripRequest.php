<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTripRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tripName' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'start_datepicker' => 'required|date',
            'end_datepicker' => 'required|date|after:start_datepicker',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
