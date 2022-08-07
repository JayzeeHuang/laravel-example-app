<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:platform-bill']);
        $this->admin = Auth::guard()->user();
    }

    public function get()
    {
        return response()->json(Bill::paginate(15));
    }

    public function create(Request $request)
    {
        $bill = Bill::create($request->all());
        return response()->json($bill, 201);
    }

    public function update(Request $request, $sn)
    {

        $bill = Bill::where('sn', $sn)->first()->update($request->toArray());
        return response()->json($bill);
    }

    public function delete($sn)
    {
        $bill = Bill::find($sn)->delete();
        return response()->json(200);
    }
}