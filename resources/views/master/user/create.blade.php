<x-dashboard.layout>
  <x-dashboard.breadcrumb />
  <div class="card">
    <div class="card-header bg-dark text-light fw-bold">User Detail</div>
    <div class="card-body">
      @error('error')
        <div class="mt-2 alert alert-danger">{{ $message }}</div>
      @enderror
      @if (session()->has('success'))
        <div class="mt-2 alert alert-success">{{ session('success') }}</div>
      @endif
      <form action="{{ route('dashboard.master.user.store') }}" method="post" class="mb-3">
        @csrf
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="username" class="form-control @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="username-help" value="{{ old('username') }}">
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
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
          <label for="no_hp" class="form-label">No Hp</label>
          <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
          @error('no_hp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Password Confirmation</label>
          <input type="password_confirmation" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Type</label>
          <select name="user_type" id="user_type" class="form-control form-select @error('user_type') is-invalid @enderror">
            @foreach ($types as $type)
                <option value="{{ $type['value'] }}" @if (old('user_type') == $type['value'])
                    selected
                @endif>{{ $type['name'] }}</option>
            @endforeach
          </select>
          @error('user_type')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
      </form>
      <hr>
      <a href="{{ route('dashboard.master.user.index') }}" class="text-white btn btn-sm btn-info">Kembali</a>
    </div>
  </div>
</x-dashboard.layout>
