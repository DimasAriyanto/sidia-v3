<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
  <div class="container-fluid py-1">
    <div class="d-flex align-items-center">
      <i class="text-white fs-4 fa-solid fa-bars-staggered"></i>
      <form role="search" class="mx-3">
        <input class="form-control fw-light" type="search" placeholder="Search" aria-label="Search">
      </form>

    </div>
    <div class="dropdown px-4">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
        data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-gear"></i>
        <strong class="px-2">Settings</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li>
          <form action="{{ route('auth.post-logout') }}" method="post">
            @csrf
            <button class="dropdown-item" type="submit">Sign out</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
