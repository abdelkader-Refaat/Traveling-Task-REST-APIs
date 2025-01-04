<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Travel;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;

class TravelController extends Controller
{
    public function index(Travel $travel): JsonResponse
    {
        $travels = Travel::where('is_public', true)->whereDate('created_at' , '<=',Carbon::now())->paginate(15);


        return response()->json(['data' =>  TravelResource::collection($travels)]);


    }

}
