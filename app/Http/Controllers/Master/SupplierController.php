<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Master\Supplier;
use App\Services\Contracts\SupplierServiceInterface;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class SupplierController extends Controller
{
    protected $supplierServices;

    public function __construct(SupplierServiceInterface $supplierServices) {
        $this->supplierServices = $supplierServices;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = $this->supplierServices->getAll();

        return view('', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        try {
            $data = $request->validated();
            $this->supplierServices->create($data);

            return redirect()
                ->route('')
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
        $supplier =$this->supplierServices->getById($id);

        return view('', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $supplier =$this->supplierServices->getById($id);

        return view('', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $supplier = $this->supplierServices->update($id, $data);

            return redirect()
                ->back()
                ->with('success', 'User berhasil diubah');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal mengubah user.',
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
