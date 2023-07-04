<x-dashboard.layout>
  <x-slot:title>
    Edit Barang
    </x-slot>
    <x-dashboard.breadcrumb />
    <div class="card">
      <div class="card-header bg-dark text-light fw-bold">Edit Barang</div>
      <div class="card-body">
        @error('error')
          <div class="mt-2 alert alert-danger">{{ $message }}</div>
        @enderror
        @if (session()->has('success'))
          <div class="mt-2 alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('dashboard.master.barang.update', ['id' => $barang->id]) }}" method="post" class="mb-3">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
              value="{{ $barang->nama }}">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan"
              id="satuan" value="{{ $barang->satuan }}">
            @error('satuan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
              id="stok" value="{{ $barang->stok }}">
            @error('stok')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-sm btn-primary">
            <i class="fa-solid fa-floppy-disk"></i>
            Simpan
          </button>
        </form>
        <hr>
        <a href="{{ route('dashboard.master.barang.index') }}" class="text-white btn btn-sm btn-info">
          <i class="fa-solid fa-backward"></i>
          Kembali
        </a>
      </div>
    </div>
</x-dashboard.layout>
