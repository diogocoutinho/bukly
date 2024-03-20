<?php

namespace App\Http\Requests\Hotel\Room;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'hotel_id' => 'required|exists:hotels,id'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
