<?php

use App\Models\Hotel\Hotel;
use App\Models\User;

it('deletes a specific hotel', function () {
    $this->actingAs($user = User::factory()->create());

    $hotel = Hotel::factory()->create();

    $response = $this->delete(route('hotels.destroy', $hotel->id));

    $response->assertRedirect(route('hotels.index'));
})->group('hotel');

it('fails to delete a non-existent room and redirects back with error message', function () {
    $this->actingAs($user = User::factory()->create());

    $response = $this->delete(route('hotels.destroy', ['hotel' => 999]));

    $response->assertStatus(302);
    $response->assertSessionHasErrors();
})->group('room');
