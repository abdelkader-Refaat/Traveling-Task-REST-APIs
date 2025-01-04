<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (! $user || $user->password == $request->password) {
            return response()->json([
                'error' => 'the provided credenials are invalid',
            ], 422);

        }
        $device = substr($request->userAgent() ?? '', 0, 255);
        $user->remember_token = $user->createToken($device)->plainTextToken;
        $user->save();

        return response()->json([
            'access_token' => $user->createToken($device)->plainTextToken,
        ], 200);

    }
}
