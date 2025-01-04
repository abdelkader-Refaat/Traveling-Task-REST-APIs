<?php

namespace App\Http\Controllers;

use App\Notifications\LoginNewUser;
use Illuminate\Http\Request;


class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

    }
}
