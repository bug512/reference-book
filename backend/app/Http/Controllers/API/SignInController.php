<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actionable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class SignInController
 * @package App\Http\Controllers\API
 */
class SignInController extends Controller implements Actionable
{
    /**
     * @param Request $request
     * @return Request|mixed
     */
    public function action(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::check() || Auth::attempt($credentials, true)) {
            return response()->json(['ok']);
        }

        return response()->json(['error']);
    }
}
