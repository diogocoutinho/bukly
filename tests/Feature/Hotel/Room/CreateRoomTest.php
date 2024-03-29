<?php

use App\Models\Hotel\Hotel;
use App\Models\Hotel\Room\Room;
use App\Models\User;

it('creates a new room', function () {
    $this->actingAs($user = User::factory()->create());

    $hotel = Hotel::factory()->create();
    $roomData = Room::factory()->create([
        'hotel_id' => $hotel->id
    ])->toArray();
    $response = $this->post(route('hotels.rooms.store', ['hotel' => $hotel->id]), $roomData);

    $response->assertRedirect(route('hotels.rooms.show', ['hotel' => $hotel->id, 'room' => 2]));
})->group('room');

it('fails to create a new room with invalid data', function () {
    $this->actingAs($user = User::factory()->create());

    $hotel = Hotel::factory()->create();
    $roomData = Room::factory()->create([
        'hotel_id' => $hotel->id
    ])->toArray();
    $roomData['name'] = '';
    $response = $this->post(route('hotels.rooms.store', ['hotel' => $hotel->id]), $roomData);

    $response->assertSessionHasErrors();
})->group('room');
