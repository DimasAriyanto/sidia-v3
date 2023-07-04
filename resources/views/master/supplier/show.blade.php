<x-dashboard.layout>
  <x-slot:title>
    Detail Supplier
    </x-slot>
    <x-dashboard.breadcrumb />
    <div class="card">
      <div class="card-header bg-dark text-light fw-bold">Detail Supplier</div>
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" readonly class="form-control" id="nama" value="{{ $supplier->nama }}">
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" readonly class="form-control" id="alamat" value="{{ $supplier->alamat }}">
          </div>
          <div class="mb-3">
            <label for="nomer_telepon" class="form-label">Nomor Hp</label>
            <input type="text" readonly class="form-control" id="nomer_telepon" value="{{ $supplier->nomer_telepon }}">
          </div>
        </form>
        <a href="{{ route('dashboard.master.supplier.index') }}" class="text-white btn btn-sm btn-info">
          <i class="fa-solid fa-backward"></i>
          Kembali
        </a>
      </div>
    </div>
</x-dashboard.layout>
