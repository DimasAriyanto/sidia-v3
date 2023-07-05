<x-dashboard.layout>
  <x-slot:title>
    Create Barang
  </x-slot>
  <x-dashboard.breadcrumb />
  <div class="card">
    <div class="card-header bg-dark text-light fw-bold">Create Barang</div>
    <div class="card-body">
      @error('error')
        <div class="mt-2 alert alert-danger">{{ $message }}</div>
      @enderror
      @if (session()->has('success'))
        <div class="mt-2 alert alert-success">{{ session('success') }}</div>
      @endif
      <form action="{{ route('dashboard.master.barang.store') }}" method="post" class="mb-3">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}">
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="satuan" class="form-label">Satuan</label>
          <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" id="satuan" value="{{ old('satuan') }}">
          @error('satuan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
      </form>
      <hr>
      <a href="{{ route('dashboard.master.barang.index') }}" class="text-white btn btn-sm btn-info">Kembali</a>
    </div>
  </div>
</x-dashboard.layout>
