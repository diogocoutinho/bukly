<?php

namespace App\Http\Resources\Hotel;

use App\Http\Resources\Hotel\Room\RoomResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * @OA\Schema (
     *     schema="HotelResource",
     *     title="HotelResource",
     *     @OA\Property(
     *          property="id",
     *          type="integer",
     *          format="int64"
     *      ),
     *     @OA\Property(
     *          property="name",
     *          type="string"
     *      ),
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
     *     ),
     *     @OA\Property(
     *          property="rooms",
     *          type="array",
     *          @OA\Items(ref="#/components/schemas/RoomResource")
     *      )
     * )
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip_code,
            'website' => $this->website,
            $this->when($this->relationLoaded('rooms'), [
                'rooms' => RoomResource::collection($this->rooms)
            ])
        ];
    }
}
