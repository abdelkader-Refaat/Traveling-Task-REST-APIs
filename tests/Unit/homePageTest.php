<?php

use App\Models\Tour;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);

it('shows tours available', function () {
    Tour::createMany([
        [
            'name' => 'Tour-1',
            'starting_date' => '2024-06-27',
            'ending_date' => '2024-06-27',
            'price' => 1000,
        ],
        [
            'name' => 'Tour-2',
            'starting_date' => '2024-06-27',
            'ending_date' => '2024-06-27',
            'price' => 2000,
        ],
        [
            'name' => 'Tour-3',
            'starting_date' => '2024-06-27',
            'ending_date' => '2024-06-27',
            'price' => 3000,
        ],
    ]);

});
