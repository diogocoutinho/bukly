<?php

use App\Models\Hotel\Hotel;
use App\Models\User;

it('creates a new hotel', function () {
    $this->actingAs($user = User::factory()->create());

    $hotelData = Hotel::factory()->make()->toArray();

    $response = $this->post(route('hotels.store'), $hotelData);

    $response->assertRedirect(route('hotels.show', 1));
})->group('hotel');

it('fails to create a new hotel', function () {
    $this->actingAs($user = User::factory()->create());

    $hotelData = Hotel::factory()->make(['name' => ''])->toArray();

    $response = $this->post(route('hotels.store'), $hotelData);

    $response->assertSessionHasErrors('name');
})->group('hotel');
