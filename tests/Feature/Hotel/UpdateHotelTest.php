<?php

use App\Models\Hotel\Hotel;
use App\Models\User;

it('updates a specific hotel', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();
    $hotelData = Hotel::factory()->make()->toArray();

    $response = $this->put(route('hotels.update', $hotel->id), $hotelData);

    $response->assertRedirect(route('hotels.show', $hotel->id));
})->group('hotel');

it('fails to update a specific hotel', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();
    $hotelData = Hotel::factory()->make(['name' => ''])->toArray();

    $response = $this->put(route('hotels.update', $hotel->id), $hotelData);

    $response->assertSessionHasErrors('name');
})->group('hotel');
