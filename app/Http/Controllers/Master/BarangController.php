<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\StoreBarangRequest;
use App\Http\Requests\Master\UpdateBarangRequest;
use App\Services\Contracts\BarangServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BarangController extends Controller
{
    protected $barangService;

    public function __construct(BarangServiceInterface $barangService)
    {
        $this->barangService = $barangService;
    }

    public function index()
    {
        $barang = $this->barangService->getAll();

        return view('master.barang.index', compact('barang'));
    }

    public function show(int $id)
    {
        try {
            $barang = $this->barangService->getById($id);

            return view('master.barang.show', compact('barang'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.barang.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Ada masalah saat membuka halaman!',
            ]);
        }
    }

    public function create()
    {
        return view('master.barang.create');
    }

    public function edit(int $id)
    {
        try {

            $barang = $this->barangService->getById($id);

            return view('master.barang.edit', compact('barang'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.barang.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Ada masalah saat membuka halaman!',
            ]);
        }
    }

    public function store(StoreBarangRequest $request)
    {
        try {
            $data = $request->validated();
            $this->barangService->create($data);

            return redirect()
                ->back()
                ->with('success', 'Barang berhasil ditambahkan');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.barang.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menambahkan barang',
                ]);
        }
    }

    public function update(UpdateBarangRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $this->barangService->update($id, $data);

            return redirect()
                ->back()
                ->with('success', 'Barang berhasil diubah');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.barang.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal mengubah barang.',
                ]);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->barangService->delete($id);

            return redirect()
                ->back()
                ->with('success', 'Barang berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.barang.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menghapus barang.',
                ]);
        }
    }
}
