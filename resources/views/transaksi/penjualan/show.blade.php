<x-dashboard.layout>
    <x-slot:title>
      Detail Transaksi Penjualan
      </x-slot>
      <x-dashboard.breadcrumb />
      <div class="card">
        <div class="card-header bg-dark text-light fw-bold">Detail Transaksi Penjualan</div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label for="barang_id" class="form-label">Nama Barang</label>
              <input type="text" readonly class="form-control" id="barang_id" value="{{ $penjualan->barang->nama }}">
            </div>
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" readonly class="form-control" id="harga" value="{{ $penjualan->harga }}">
            </div>
            <div class="mb-3">
              <label for="jumlah" class="form-label">Stok</label>
              <input type="number" readonly class="form-control" id="jumlah" value="{{ $penjualan->jumlah }}">
            </div>
            <div class="mb-3">
              <label for="tanggal_transksi" class="form-label">Tanggal Transaksi</label>
              <input type="text" readonly class="form-control" id="tanggal_transksi" value="{{ $penjualan->tanggal_transaksi }}">
            </div>
            <div class="mb-3">
              <label for="user_id" class="form-label">Nama User </label>
              <input type="text" readonly class="form-control" id="user_id" value="{{ $penjualan->user->nama }}">
            </div>
          </form>
          <a href="{{ route('dashboard.transaksi.penjualan.index') }}" class="text-white btn btn-sm btn-info">
            <i class="fa-solid fa-backward"></i>
            Kembali
          </a>
        </div>
      </div>
  </x-dashboard.layout>
