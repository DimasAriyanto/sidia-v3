<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function index()
    {
        return view('master.barang.index');
    }

    public function show(int $id)
    {
        return view('master.barang.show');
    }

    public function create()
    {
        return view('master.barang.create');
    }

    public function edit(int $id)
    {
        return view('master.barang.edit');
    }
}
