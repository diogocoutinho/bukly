<?php

use App\Models\Hotel\Hotel;
use App\Models\Hotel\Room\Room;
use App\Models\User;

it('deletes a specific room and redirects back with success message', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();
    $room = Room::factory()->create(['hotel_id' => $hotel->id]);

    $response = $this->delete(route('hotels.rooms.destroy', ['hotel' => $hotel->id, 'room' => $room->id]));

    $response->assertStatus(302);
    $this->withSession(['_flash.old' => ['room' => 'Room deleted successfully']]);

})->group('room');

it('fails to delete a non-existent room and redirects back with error message', function () {
    $this->actingAs($user = User::factory()->create());
    $hotel = Hotel::factory()->create();

    $response = $this->delete(route('hotels.rooms.destroy', ['hotel' => $hotel, 'room' => 999]));

    $response->assertStatus(302);
    $response->assertSessionHasErrors();
})->group('room');
