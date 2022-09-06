<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminBillReportDownloadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_download_txt_report()
    {
        $this->getJson('/api/v1/admin/bills/reports/export/TXT')
            ->assertStatus(200)->assertSee('TXT export');
    }
}
