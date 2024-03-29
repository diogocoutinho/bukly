<?php

use App\Models\Hotel\Hotel;
use App\Models\Hotel\Room\Room;
use App\Models\User;

it('displays a specific room', function () {
    $this->actingAs($user = User::factory()->create());

    $hotel = Hotel::factory()->create();
    $room = Room::factory()->create(['hotel_id' => $hotel->id]);

    $response = $this->get(route('hotels.rooms.show', ['hotel' => $hotel->id, 'room' => $room->id]));

    $response->assertStatus(200);

    $response->assertViewIs('hotel.room.show');
})->group('room');

it('fails to display a specific room with non-existent room', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();

    $response = $this->get(route('hotels.rooms.show', ['hotel' => $hotel, 'room' => 999]));
    $response->assertStatus(404);
})->group('room');
