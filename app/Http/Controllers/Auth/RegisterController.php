<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
	public function __construct() {
		$this->middleware('guest');
	}

    function store(RegisterRequest $request) {
        $validated = $request->validated();
        $data = array_merge($request->all(), ['hash_id' => Hash::make($request->email), 'password' => bcrypt($request->input('password'))]);
        $user = User::create($data);
        // $user = User::where('email', $request->input('email'))->first();
		$token = Auth::login($user);
        return response()->json(array('status' => 'success', 'token' => $token), 201);
	}
}
