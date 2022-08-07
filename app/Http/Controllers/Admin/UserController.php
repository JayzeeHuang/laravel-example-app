<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:platform-user']);
        $this->admin = Auth::guard()->user();
    }

    public function get()
    {
        return response()->json(User::paginate(15));
        // return response()->json(DB::table('users')->get()->take(600));
    }

}
