<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BillReportExportController extends Controller
{
    public function export(string $format)
    {
        try {
            $className = 'App\Services\BillReportExport'.strtoupper($format).'Service';
            return  (new $className)->export();
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Export format not found!'
            ], 404);
        }
    }
}
