<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'cid' => 'required|string|max:255|unique:tblcustomer,cid,' . $this->id,
            'cname' => 'required|string|max:255',
            'cemail' => 'required|email|unique:tblcustomer,cemail,' . $this->id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
        ];
    }
}
