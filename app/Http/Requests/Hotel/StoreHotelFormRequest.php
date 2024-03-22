<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema (
 *     schema="StoreHotelFormRequest",
 *     title="StoreHotelFormRequest",
 *     required={"name", "address", "city", "state", "zip_code"},
 *     description="Store Hotel Form Request",
 *     @OA\Property(
 *          property="name",
 *          type="string",
 *          description="Hotel name",
 *     ),
 *     @OA\Property(
 *          property="address",
 *          type="string"
 *     ),
 *     @OA\Property(
 *          property="city",
 *          type="string"
 *     ),
 *     @OA\Property(
 *          property="state",
 *          type="string"
 *     ),
 *     @OA\Property(
 *          property="zip_code",
 *          type="string"
 *     ),
 *     @OA\Property(
 *          property="website",
 *          type="string"
 *     )
 * )
 */
class StoreHotelFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
        ];
    }
}
