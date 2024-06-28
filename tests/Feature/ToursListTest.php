<?php

use App\Models\Tour;
use App\Models\Travel;

test('test_tours_list_specified_to_travel_slug_return_corredt_tours', function () {

    $travel = Travel::first();
    $tour = Tour::all();
    $response = $this->get('/api/v1/travels'.$travel->slug.'/tours');

    $response->assertStatus(200);
});
