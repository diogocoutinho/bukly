<?php

use App\Models\Hotel\Hotel;
use App\Models\User;

it('displays a list of hotels', function () {
    $this->actingAs($user = User::factory()->create());

    Hotel::factory()->count(5)->create();

    $response = $this->get(route('hotels.index'));

    $response->assertStatus(200);
    $response->assertViewHas('hotels');
})->group('hotel');

it('fails to display a list of hotels with non-existent hotel', function () {
    $this->actingAs($user = User::factory()->create());

    $response = $this->get(route('hotels.index'));

    $response->assertStatus(200);
    $response->assertViewHas('hotels');
})->group('hotel');
