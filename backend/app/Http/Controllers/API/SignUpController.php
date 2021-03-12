<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * Class SignUpController
 * @package App\Http\Controllers\API
 */
class SignUpController extends Controller implements Actionable
{
    /**
     * @param Request $request
     * @return Request|mixed
     */
    public function action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag());
        }

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
