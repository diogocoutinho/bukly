<?php

namespace App\Http\Resources\Hotel\Room;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * @OA\Schema (
     *     schema="RoomResource",
     *     title="RoomResource",
     *     @OA\Property(
     *          property="id",
     *          type="integer",
     *          format="int64"
     *     ),
     *     @OA\Property(
     *          property="name",
     *          type="string"
     *     ),
     *     @OA\Property(
     *          property="description",
     *          type="string"
     *     ),
     *     @OA\Property(
     *          property="hotel_id",
     *          type="integer",
     *          format="int64"
     *     )
     * )
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'hotel_id' => $this->hotel_id,
        ];
    }
}
