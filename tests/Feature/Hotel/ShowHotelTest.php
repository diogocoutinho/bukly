<?php

use App\Models\Hotel\Hotel;
use App\Models\User;

it('displays a specific hotel', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();

    $response = $this->get(route('hotels.show', $hotel->id));

    $response->assertStatus(200);
    $response->assertViewIs('hotel.show');
})->group('hotel');

it('fails to display a specific hotel with non-existent hotel', function () {
    $this->actingAs($user = User::factory()->create());

    $response = $this->get(route('hotels.show', 999));

    $response->assertStatus(404);
})->group('hotel');
