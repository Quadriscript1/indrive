<?php

namespace App\Module\Driver\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
        return [
            //
            'user_id' =>'sometimes|exists:users,id',
            'year' =>'required|numeric|between:2001,2024',
            'make' =>'required',
            'model' =>'required',
            'color' =>'required',
            'license_plate' =>'required',
            'name' =>'required',

        ];
    }
}
