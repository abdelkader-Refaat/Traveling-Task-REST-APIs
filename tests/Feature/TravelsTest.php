<?php

use App\Models\Travel;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);

test('get only public travels', function () {
    $Travel = Travel::factory()->createMany([
        [
            'name' => 'Travel34',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 2,
        ],
        [
            'name' => 'Travel35',
            'is_public' => 0,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],
        [
            'name' => 'Travel36',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],
        [
            'name' => 'Travel37',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],

    ]);
    $this->get(route('travels.index'))
        ->assertStatus(200)
        ->assertJsonCount(3, 'data');
});

test('get in order Desc  travels', function () {
    $Travel = Travel::factory()->createMany([
        [
            'name' => 'Travel34',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 2,
        ],
        [
            'name' => 'Travel35',
            'is_public' => 0,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],
        [
            'name' => 'Travel36',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],
        [
            'name' => 'Travel37',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],

    ]);

    $this->get(route('travels.index'))
        ->assertStatus(200)
        ->assertSeeTextInOrder(['Travel34', 'Travel36', 'Travel37']);
});


test('get all travels which created in past', function () {

    $Travel = Travel::factory()->createMany([
        [
            'name' => 'Travel34',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 2,
        ],
        [
            'name' => 'Travel35',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],
        [
            'name' => 'Travel36',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],
        [
            'name' => 'Travel37',
            'is_public' => 1,
            'description' => "asfsfsfssffsf",
            'number_of_days' => 3,
        ],

    ]);

    $this->get(route('travels.index'))
        ->assertStatus(200)
        ->assertJsonCount(4, 'data');
});





