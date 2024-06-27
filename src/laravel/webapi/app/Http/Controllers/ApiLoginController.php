<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class ApiLoginController extends Controller
{
    /**
     * ログイン
     */
    public function show(LoginRequest $request)
    {
        \Log::Debug('called ApiLoginController::show');
        $user = Auth::user();
        return response()->json([
            'data' => $user
        ], 200);
    }

    /**
     * ログイン
     */
    public function login(LoginRequest $request)
    {
        \Log::Debug('called ApiLoginController::login');
        $request->authenticate();
        $user = Auth::user();
        return response()->json([
            'data' => $user
        ], 200);
    }
}
