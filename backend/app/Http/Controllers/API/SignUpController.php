<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class SignUpController
 * @package App\Http\Controllers\API
 */
class SignUpController extends Controller
{
    /**
     * @param Request $request
     * @return Request|mixed
     */
    public function action(SignUpRequest $request)
    {
        try {
            $credentials = $request->only('name', 'email', 'password');
            $credentials['password'] = Hash::make($credentials['password']);

            $modelUser = new User($credentials);
            $modelUser->email_verified_at = now();
            $modelUser->remember_token = Str::random(10);
            $saved = $modelUser->save();
        } catch (\Throwable $exception) {
            return response()->json(['error', $exception->getMessage(), $exception->getTraceAsString()]);
        }

        if (!$saved) {
            return response()->json('error');
        }

        return response()->json('ok');
    }
}
