<x-dashboard.layout>
  <x-slot:title>
    Rekap Barang
    </x-slot>
    <x-dashboard.breadcrumb />
    <table class="table-bordered table w-100 text-center align-middle" style="font-size: 0.875em">
      <tr>
        <th rowspan="3">Nama Barang</th>
        <th colspan="4">Transaksi</th>
        <th colspan="2">Total</th>
      </tr>
      <tr>
        <th colspan="2">Pembelian</th>
        <th colspan="2">Penjualan</th>
        <th rowspan="2">Harga</th>
        <th rowspan="2">Jumlah</th>
      </tr>
      <tr>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Jumlah</th>
      </tr>
      <tr class="fw-bold">
        <td class="text-start px-4">Total</td>
        <td class="text-end px-4">{{ number_format($data->sum('harga_pembelian'), 2) }}</td>
        <td>{{ $data->sum('jumlah_pembelian') }}</td>
        <td class="text-end px-4">{{ number_format($data->sum('harga_penjualan'), 2) }}</td>
        <td>{{ $data->sum('jumlah_penjualan') }}</td>
        <td class="text-end px-4">{{ number_format($data->sum('total_harga'), 2) }}</td>
        <td>{{ $data->sum('total_jumlah') }}</td>
      </tr>
      @if (count($data))
        @foreach ($data as $item)
          <tr>
            <td class="text-start px-4">{{ $item->nama_barang }}</td>
            <td class="text-end px-4">{{ number_format($item->harga_pembelian, 2) }}</td>
            <td>{{ $item->jumlah_pembelian }}</td>
            <td class="text-end px-4">{{ number_format($item->harga_penjualan, 2) }}</td>
            <td>{{ $item->jumlah_penjualan }}</td>
            <td class="text-end px-4">{{ number_format($item->total_harga, 2) }}</td>
            <td>{{ $item->total_jumlah }}</td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="100">Tidak ada data yang ditemukan.</td>
        </tr>
      @endif
      <tfoot>
        <tr class="fw-bold">
          <td class="text-start px-4">Total</td>
          <td class="text-end px-4">{{ number_format($data->sum('harga_pembelian'), 2) }}</td>
          <td>{{ $data->sum('jumlah_pembelian') }}</td>
          <td class="text-end px-4">{{ number_format($data->sum('harga_penjualan'), 2) }}</td>
          <td>{{ $data->sum('jumlah_penjualan') }}</td>
          <td class="text-end px-4">{{ number_format($data->sum('total_harga'), 2) }}</td>
          <td>{{ $data->sum('total_jumlah') }}</td>
        </tr>
      </tfoot>
    </table>
</x-dashboard.layout>
