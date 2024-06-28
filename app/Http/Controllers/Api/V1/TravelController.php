<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use App\Models\User;

class TravelController extends Controller
{
    public function index(Travel $travel)
    {
        $user = User::where('email', 'abdelkader@gmail.com')->first();
        $travels = Travel::where('is_public', true)->paginate(15);

        return TravelResource::collection($travels);

    }
}
