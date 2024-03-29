<?php

use App\Models\Hotel\Hotel;
use App\Models\User;
use App\Models\Hotel\Room\Room;

it('updates a specific room with authenticated user', function () {
    $this->actingAs($user = User::factory()->create());

    $hotel = Hotel::factory()->create();
    $room = Room::factory()->create(['hotel_id' => $hotel->id]);
    $roomData = Room::factory()->make(['hotel_id' => $hotel->id])->toArray();

    $response = $this->put(route('hotels.rooms.update', ['hotel' => $hotel->id, 'room' => $room->id]), $roomData);

    $response->assertStatus(302);

    $response->assertRedirect(route('hotels.rooms.show', ['hotel' => $hotel->id, 'room' => $room->id]));
})->group('room');

it('fails to update a specific room with authenticated user', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();
    $room = Room::factory()->create(['hotel_id' => $hotel->id]);
    $roomData = Room::factory()->make(['name' => ''])->toArray();

    $response = $this->actingAs($user)->put(route('hotels.rooms.update', ['hotel' => $hotel, 'room' => $room->id]), $roomData);

    $response->assertSessionHasErrors('name');
})->group('room');
