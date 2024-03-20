<?php

use App\Livewire\Teste2;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Teste2::class)
        ->assertStatus(200);
});
