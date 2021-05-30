<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'min:12', 'max:64'],
            'password' => ['required', 'min:8', 'max:128']
        ]);

        if ($validator->fails()) {
            return response()
                ->json(
                    [
                        'error' => true,
                        'validations' => $validator->errors()
                    ],
                    422
                );
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = auth()->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);

            $token->save();

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Berhasil login',
                    'redirect_to' => ($user->role === 'admin') ? route('admin.index') : RouteServiceProvider::HOME,
                    'token' => ($user->role === 'admin') ? [
                        'accessToken' => $tokenResult->accessToken,
                        'expiresAt' => $tokenResult->token->expires_at
                    ] : null
                ]);
        }

        return response()
            ->json([
                'error' => true,
                'validations' => [
                    'result' => 'Email atau Password salah!'
                ]
            ], 401);
    }
}
