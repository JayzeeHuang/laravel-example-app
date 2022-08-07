<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:platform-payment']);
        $this->admin = Auth::guard()->user();
    }

    
    public function get()
    {
        return response()->json(Payment::paginate(15));
    }

    public function create(Request $request)
    {
        $bill = Payment::create($request->all());
        return response()->json($bill, 201);
    }

    public function update(Request $request, $sn)
    {
        $bill = Payment::find($sn)->update($request->all);
        return response()->json($bill);
    }

    public function delete($sn)
    {
        $bill = Payment::find($sn)->delete();
        return response()->json(200);
    }
}
