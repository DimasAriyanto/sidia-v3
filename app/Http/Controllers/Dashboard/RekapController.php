<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class RekapController extends Controller
{
    public function barang()
    {
        return view('rekap.barang');
    }
}
