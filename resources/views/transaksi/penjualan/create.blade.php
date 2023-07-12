<x-dashboard.layout>
    <x-slot:title>
        Create Transaksi Penjualan
        </x-slot>
        <x-dashboard.breadcrumb />
        <div class="card">
            <div class="card-header bg-dark text-light fw-bold">Create Transaksi Penjualan</div>
            <div class="card-body">
                @error('error')
                    <div class="mt-2 alert alert-danger">{{ $message }}</div>
                @enderror
                @if (session()->has('success'))
                    <div class="mt-2 alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('dashboard.transaksi.penjualan.store') }}" method="post" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Barang</label>
                        <select class="select-barang form-control @error('barang_id') is-invalid @enderror" name="barang_id">
                            @foreach ($barangData as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                            @endforeach
                        </select>
                        @error('barang_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                            id="harga" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                            id="jumlah" value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan
                    </button>
                <a href="{{ route('dashboard.transaksi.penjualan.index') }}" class="text-white btn btn-sm btn-info mx-2">
                    <i class="fa-solid fa-backward"></i>
                    Kembali
                </a>
                </form>
            </div>
        </div>

        @push('scripts')
            <script>
                $(document).ready(function() {
                    $('.select-barang').select2({
                        theme: 'bootstrap-5'
                    });
                })
            </script>
        @endpush
</x-dashboard.layout>
