<?php

namespace Database\Factories\Hotel\Room;

use App\Models\Hotel\Hotel;
use App\Models\Hotel\Room\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => Hotel::factory(),
            'name' => $this->faker->word,
            'description' => $this->faker->text,
        ];
    }
}
