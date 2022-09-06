<?php

namespace App\Services;

use App\Interfaces\BillReportInterface;

class BillReportExportTXTService implements BillReportInterface
{
    public function export()
    {
        return "TXT export";
    }
}
