<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="UpdateHotelFormRequest",
 *     type="object",
 *     required={"name", "address", "city", "state", "zip_code"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the hotel",
 *         example="Hotel California"
 *     ),
 *     @OA\Property(
 *         property="address",
 *         type="string",
 *         description="The address of the hotel",
 *         example="42 Sunset Boulevard"
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         description="The city where the hotel is located",
 *         example="Los Angeles"
 *     ),
 *     @OA\Property(
 *         property="state",
 *         type="string",
 *         description="The state where the hotel is located",
 *         example="California"
 *     ),
 *     @OA\Property(
 *         property="zip_code",
 *         type="string",
 *         description="The zip code of the hotel",
 *         example="90028"
 *     ),
 *     @OA\Property(
 *         property="website",
 *         type="string",
 *         description="The website of the hotel",
 *         example="http://www.hotelcalifornia.com",
 *         nullable=true
 *     )
 * )
 */
class UpdateHotelFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
        ];
    }
}
