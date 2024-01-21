<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this based on your authorization logic
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'team_id' => 'required|exists:teams,id',
        ];
    }
}
