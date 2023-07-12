<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ReportServiceInterface;

class RekapController extends Controller
{
    protected ReportServiceInterface $reportService;

    public function __construct(ReportServiceInterface $reportService)
    {
        $this->reportService = $reportService;
    }

    public function barang()
    {
        $data = $this->reportService->getRekapBarang();

        return view('rekap.barang', compact('data'));
    }
}
