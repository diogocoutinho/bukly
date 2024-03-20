<?php

namespace Database\Seeders;

use App\Models\Hotel\Hotel;
use Illuminate\Database\Seeder;

class CreateHotelsAndRooms extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::factory(10)->hasRooms(10)->create();
    }
}
