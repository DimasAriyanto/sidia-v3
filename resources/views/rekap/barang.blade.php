<x-dashboard.layout>
  <x-slot:title>
    Rekap Barang
    </x-slot>
    <x-dashboard.breadcrumb />
    <table class="table-bordered table w-100 text-center align-middle" style="font-size: 0.875em">
      <tr>
        <th rowspan="3">Nama Barang</th>
        <th colspan="6">Transaksi</th>
        <th rowspan="3">Selisih Beli & Jual</th>
      </tr>
      <tr>
        <th colspan="3">Pembelian</th>
        <th colspan="3">Penjualan</th>
      </tr>
      <tr>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
      </tr>
      <tr class="fw-bold">
        <td class="text-start px-4">Total</td>
        <td class="text-end px-4">{{ number_format($data->sum('harga_pembelian'), 2) }}</td>
        <td>{{ $data->sum('jumlah_pembelian') }}</td>
        <td class="text-end px-4">{{ number_format($data->sum('total_pembelian'), 2) }}</td>
        <td class="text-end px-4">{{ number_format($data->sum('harga_penjualan'), 2) }}</td>
        <td>{{ $data->sum('jumlah_penjualan') }}</td>
        <td class="text-end px-4">{{ number_format($data->sum('total_penjualan'), 2) }}</td>
        <td class="text-end px-4">{{ number_format($data->sum('total_selisih'), 2) }}</td>
      </tr>
      @if (count($data))
        @foreach ($data as $item)
          <tr>
            <td class="text-start px-4">{{ $item->nama_barang }}</td>
            <td class="text-end px-4">{{ number_format($item->harga_pembelian, 2) }}</td>
            <td>{{ $item->jumlah_pembelian }}</td>
            <td class="text-end px-4">{{ number_format($item->total_pembelian, 2) }}</td>
            <td class="text-end px-4">{{ number_format($item->harga_penjualan, 2) }}</td>
            <td>{{ $item->jumlah_penjualan }}</td>
            <td class="text-end px-4">{{ number_format($item->total_penjualan, 2) }}</td>
            <td class="text-end px-4">{{ number_format($item->total_selisih, 2) }}</td>
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
          <td class="text-end px-4">{{ number_format($data->sum('total_pembelian'), 2) }}</td>
          <td class="text-end px-4">{{ number_format($data->sum('harga_penjualan'), 2) }}</td>
          <td>{{ $data->sum('jumlah_penjualan') }}</td>
          <td class="text-end px-4">{{ number_format($data->sum('total_penjualan'), 2) }}</td>
          <td class="text-end px-4">{{ number_format($data->sum('total_selisih'), 2) }}</td>
        </tr>
      </tfoot>
    </table>
</x-dashboard.layout>
