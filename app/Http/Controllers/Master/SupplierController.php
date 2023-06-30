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

    /**
     * Display a listing of the resource.
     */
    public function index(SuppliersDataTable $dataTable)
    {
        return $dataTable->render('master.supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        try {
            $data = $request->validated();
            $this->supplierServices->create($data);

            return back()
                ->with('success', 'Supplier berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menambah supplier.',
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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
