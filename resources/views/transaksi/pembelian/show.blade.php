<x-dashboard.layout>
    <x-slot:title>
      Detail Transaksi Pembelian
      </x-slot>
      <x-dashboard.breadcrumb />
      <div class="card">
        <div class="card-header bg-dark text-light fw-bold">Detail Transaksi Pembelian</div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label for="barang_id" class="form-label">Nama Barang</label>
              <input type="text" readonly class="form-control" id="barang_id" value="{{ $pembelian->barang->nama }}">
            </div>
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" readonly class="form-control" id="harga" value="{{ $pembelian->harga }}">
            </div>
            <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah</label>
              <input type="number" readonly class="form-control" id="jumlah" value="{{ $pembelian->jumlah }}">
            </div>
            <div class="mb-3">
              <label for="supplier_id" class="form-label">Stok</label>
              <input type="text" readonly class="form-control" id="supplier_id" value="{{ $pembelian->supplier->nama }}">
            </div>
            <div class="mb-3">
              <label for="tanggal_transksi" class="form-label">Tanggal Transaksi</label>
              <input type="text" readonly class="form-control" id="tanggal_transksi" value="{{ $pembelian->tanggal_transaksi }}">
            </div>
            <div class="mb-3">
              <label for="user_id" class="form-label">Nama User </label>
              <input type="text" readonly class="form-control" id="user_id" value="{{ $pembelian->user->nama }}">
            </div>
          </form>
          <a href="{{ route('dashboard.transaksi.pembelian.index') }}" class="text-white btn btn-sm btn-info">
            <i class="fa-solid fa-backward"></i>
            Kembali
          </a>
        </div>
      </div>
  </x-dashboard.layout>
