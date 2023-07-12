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

        <div class="card my-3">
          <div class="card-header bg-primary fw-bold text-light">Histori Transaksi</div>
          <div class="card-body">
            <table class="table w-100 table-bordered" id="table-history-transaksi">
              <thead>
                <tr>
                  <td width="20%">Tanggal</td>
                  <td width="15%">Jam (Waktu Server)</td>
                  <td>Harga</td>
                  <td>Jumlah</td>
                  <td>Total</td>
                  <td>Jenis Transaksi</td>
                </tr>
              </thead>
            </table>
          </div>
        </div>

        <a href="{{ route('dashboard.master.barang.index') }}" class="text-white btn btn-sm btn-info">
          <i class="fa-solid fa-backward"></i>
          Kembali
        </a>
      </div>
    </div>

    @push('scripts')
      <script>
        const tableHistoryTransaksi = $('#table-history-transaksi')
        tableHistoryTransaksi.DataTable({
          ajax: "{{ route('api.master.barang.history_transaksi.datatable', ['barangId' => $barang->id]) }}",
          ordering: false,
          columns: [
            {data: 'tanggal_transaksi', render: toIndonesianDateTanggal},
            {data: 'tanggal_transaksi', render: toIndonesianDateWaktu},
            {data: 'harga', render: harga => formatNumber(harga, 2), className: 'text-end'},
            {data: 'jumlah'},
            {data: 'total', render: total => formatNumber(total, 2), className: 'text-end'},
            {data: 'jenis_transaksi', render: ucfirst},
          ],
          createdRow: (tr, data) => {
            if (data.jenis_transaksi == 'pembelian') {
              $(tr).addClass('table-success')
            } else if (data.jenis_transaksi == 'penjualan') {
              $(tr).addClass('table-danger')
            }
          }
        })
      </script>
    @endpush
</x-dashboard.layout>
