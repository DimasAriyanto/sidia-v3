<?php

namespace App\Http\Controllers\Master;

use App\DataTables\SuppliersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\StoreSupplierRequest;
use App\Http\Requests\Master\UpdateSupplierRequest;
use App\Services\Contracts\SupplierServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupplierController extends Controller
{
    protected $supplierServices;

    public function __construct(SupplierServiceInterface $supplierServices)
    {
        $this->supplierServices = $supplierServices;
    }

    public function index(SuppliersDataTable $dataTable)
    {
        return $dataTable->render('master.supplier.index');
    }

    public function show(int $id)
    {
        try {
            $supplier = $this->supplierServices->getById($id);

            return view('master.supplier.show', compact('supplier'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.supplier.index')
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
        return view('master.supplier.create');
    }

    public function edit(int $id)
    {
        try {
            $supplier = $this->supplierServices->getById($id);

            return view('master.supplier.edit', compact('supplier'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.supplier.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Ada masalah saat membuka halaman!',
            ]);
        }
    }

    public function store(StoreSupplierRequest $request)
    {
        try {
            $data = $request->validated();
            $this->supplierServices->create($data);

            return redirect()
                ->back()
                ->with('success', 'Supplier berhasil ditambahkan');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.supplier.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menambah supplier.',
                ]);
        }
    }

    public function update(UpdateSupplierRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $this->supplierServices->update($id, $data);

            return redirect()
                ->back()
                ->with('success', 'Supplier berhasil diubah');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.supplier.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal mengubah supplier.',
                ]);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->supplierServices->delete($id);

            return redirect()
                ->back()
                ->with('success', 'Supplier berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.supplier.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menghapus supplier.',
                ]);
        }
    }
}
