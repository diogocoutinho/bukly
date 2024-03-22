<?php

namespace App\Http\Requests\Hotel\Room;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="UpdateRoomFormRequest",
 *     description="Update Room Form Request",
 *     required={"name", "description", "hotel_id"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Room 1"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         example="Room 1 description"
 *     ),
 *     @OA\Property(
 *         property="hotel_id",
 *         type="integer",
 *         example="1"
 *     )
 * )
 */
class UpdateRoomFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'hotel_id' => 'required|exists:hotels,id'
        ];
    }

    public function authorize(): bool
    {
        return auth()->check();
    }
}
