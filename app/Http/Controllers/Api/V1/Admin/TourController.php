<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequestStore;
use App\Http\Resources\TourResource;
use App\Models\Travel;

class TourController extends Controller
{
    public function store(Travel $travel, TourRequestStore $request)
    {
        $tours = $travel->tours()->where('travel_id' , $request->travel_id)->create($request->validated());

        return new TourResource($tours);

    }
}
