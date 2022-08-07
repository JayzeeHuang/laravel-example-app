<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'login', 'refresh']]);
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if ($request->has('phone')) {
            $field = 'phone';
        } else {
            $field = 'email';
        }
        $credentials = $request->only([$field, 'password']);
        // return dd(auth()->attempt($credentials));
        if (!$token = Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Invalid credentials!'
            ], 401);
        }
        return response()->json(array('status' => 'success', 'token' => $token));
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function refresh()
    {
        $token = Auth::refresh();
        return response()->json(array('status' => 'success', 'token' => $token));
    }
}
