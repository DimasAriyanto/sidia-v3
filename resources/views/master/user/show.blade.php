<x-dashboard.layout>
  <x-slot:title>
    Detail User
    </x-slot>
    <x-dashboard.breadcrumb />
    <div class="card">
      <div class="card-header bg-dark text-light fw-bold">Detail User</div>
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" readonly class="form-control" id="username" aria-describedby="username-help"
              value="{{ $user->username }}">
            <div id="username-help" class="form-text">Never share your username with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" readonly class="form-control" id="nama" value="{{ $user->nama }}">
          </div>
          <div class="mb-3">
            <label for="no_hp" class="form-label">No Hp</label>
            <input type="text" readonly class="form-control" id="no_hp" value="{{ $user->no_hp }}">
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" readonly class="form-control" id="type" value="{{ ucfirst($user->user_type) }}">
          </div>
          <div class="mb-3">
            <label for="created_at" class="form-label">Tanggal Dibuat</label>
            <input type="text" readonly class="form-control" id="created_at" value="{{ $user->created_at }}">
          </div>
          <div class="mb-3">
            <label for="updated_at" class="form-label">Tanggal Diupdate</label>
            <input type="text" readonly class="form-control" id="updated_at" value="{{ $user->updated_at }}">
          </div>
        </form>
        <a href="{{ route('dashboard.master.user.index') }}" class="text-white btn btn-sm btn-info">
          <i class="fa-solid fa-backward"></i>
          Kembali
        </a>
      </div>
    </div>
</x-dashboard.layout>
