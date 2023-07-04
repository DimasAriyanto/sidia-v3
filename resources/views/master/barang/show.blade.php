<x-dashboard.layout>
  <x-slot:title>
    Detail Barang
    </x-slot>
    <x-dashboard.breadcrumb />
    <div class="card">
      <div class="card-header bg-dark text-light fw-bold">Detail Barang</div>
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" readonly class="form-control" id="nama" value="{{ $barang->nama }}">
          </div>
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" readonly class="form-control" id="satuan" value="{{ $barang->satuan }}">
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" readonly class="form-control" id="stok" value="{{ ucfirst($barang->stok) }}">
          </div>
          <div class="mb-3">
            <label for="created_at" class="form-label">Tanggal Dibuat</label>
            <input type="text" readonly class="form-control" id="created_at" value="{{ $barang->created_at }}">
          </div>
          <div class="mb-3">
            <label for="updated_at" class="form-label">Tanggal Diupdate</label>
            <input type="text" readonly class="form-control" id="updated_at" value="{{ $barang->updated_at }}">
          </div>
        </form>
        <a href="{{ route('dashboard.master.barang.index') }}" class="text-white btn btn-sm btn-info">
          <i class="fa-solid fa-backward"></i>
          Kembali
        </a>
      </div>
    </div>
</x-dashboard.layout>
