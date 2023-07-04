<x-dashboard.layout>
  <x-slot:title>
    Edit Supplier
    </x-slot>
    <x-dashboard.breadcrumb />
    <div class="card">
      <div class="card-header bg-dark text-light fw-bold">Edit Supplier</div>
      <div class="card-body">
        @error('error')
          <div class="mt-2 alert alert-danger">{{ $message }}</div>
        @enderror
        @if (session()->has('success'))
          <div class="mt-2 alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('dashboard.master.supplier.update', ['id' => $supplier->id]) }}" method="post" class="mb-3">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
              value="{{ $supplier->nama }}">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
              id="alamat" value="{{ $supplier->alamat }}">
            @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nomer_telepon" class="form-label">Nomer Telepon</label>
            <input type="text" class="form-control @error('nomer_telepon') is-invalid @enderror" name="nomer_telepon"
              id="nomer_telepon" value="{{ $supplier->nomer_telepon }}">
            @error('nomer_telepon')
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
        <a href="{{ route('dashboard.master.supplier.index') }}" class="text-white btn btn-sm btn-info">
          <i class="fa-solid fa-backward"></i>
          Kembali
        </a>
      </div>
    </div>
</x-dashboard.layout>
