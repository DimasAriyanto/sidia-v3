<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Contracts\BarangServiceInterface;
use Illuminate\Http\Request;

class BarangApiController extends Controller
{
    protected BarangServiceInterface $barangService;

    public function __construct(BarangServiceInterface $barangService)
    {
        $this->barangService = $barangService;
    }

    public function getHistoryTransaksiDataTable(Request $request, int $barangId)
    {
        $historyTransaksi = $this->barangService->getHistoryTransaksiBuilder($barangId);

        return datatables($historyTransaksi)->make();
    }
}
