<?php

use App\Livewire\Teste;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Teste::class)
        ->assertStatus(200);
});
