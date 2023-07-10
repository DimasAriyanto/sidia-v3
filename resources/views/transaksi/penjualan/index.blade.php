<x-dashboard.layout>
  <x-slot:title>
   Manage Transaksi Penjualan
  </x-slot>
  <x-dashboard.breadcrumb />
  <div class="card">
    <div class="card-header bg-dark text-light fw-bold">Manage Transaksi Penjualan</div>
    <div class="card-body">
      @error('error')
        <div class="mt-2 alert alert-danger">{{ $message }}</div>
      @enderror
      @if (session()->has('success'))
        <div class="mt-2 alert alert-success">{{ session('success') }}</div>
      @endif
      <a href="{{ route('dashboard.transaksi.penjualan.create') }}" class="btn btn-sm btn-primary mb-3">
        <i class="fa-solid fa-plus"></i>
        Tambah
      </a>
      {!! $dataTable->table(['class' => 'table table-bordered']) !!}
    </div>
  </div>
  @push('scripts')
    {!! $dataTable->scripts(attributes: ['type' => 'module']) !!}
  @endpush
</x-dashboard.layout>
