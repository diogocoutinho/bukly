<?php

use App\Models\Hotel\Hotel;
use App\Models\Hotel\Room\Room;
use App\Models\User;

it('displays a list of rooms', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();
    Room::factory()->count(5)->create(['hotel_id' => $hotel->id]);

    $response = $this->get(route('hotels.rooms.index', ['hotel' => $hotel->id]));
    $response->assertStatus(200);
    $response->assertViewHas('rooms');
})->group('room');

it('displays a list of rooms with search query', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();
    Room::factory()->count(5)->create(['hotel_id' => $hotel->id]);

    $response = $this->get(route('hotels.rooms.index', ['hotel' => $hotel->id, 'search' => 'room']));
    $response->assertStatus(200);
    $response->assertViewHas('rooms');
})->group('room');
