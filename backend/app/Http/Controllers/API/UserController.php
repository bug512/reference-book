<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */
class UserController extends Controller implements Actionable
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function action(Request $request)
    {
        $user = Auth::user() ?: false;
        return response()->json($user);
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        $headers = [
            'Authorization' => 'Bearer: ' . $token
        ];

        return response()->json(compact('token'), 200, $headers);
    }

    /**
     * @param Request $request
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            throw InvalidUserException::withMessages([
                'user' => ['Authorized users not found.'],
            ]);
        }

        $user->currentAccessToken()->delete();

        Auth::logout();
    }
}
