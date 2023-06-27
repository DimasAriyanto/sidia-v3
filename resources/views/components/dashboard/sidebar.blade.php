<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi pe-none me-2" width="40" height="32">
      <use xlink:href="#bootstrap"></use>
    </svg>
    <span class="fs-4">Sidebar</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="#" class="nav-link text-white">
        <i class="fa-solid fa-home"></i>
        <span class="px-2">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-white collapsed" data-bs-toggle="collapse"
        data-bs-target="#master-collapse" aria-expanded="false">
        <i class="fa-solid fa-layer-group"></i>
        <span class="px-2">Master</span>
        <i class="fa-solid fa-angle-down float-end mt-1"></i>
      </a>
      <div class="collapse px-4 pw-2" id="master-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-light small">
          <li><a href="#" class="nav-link text-white">Pengguna</a></li>
          <li><a href="#" class="nav-link text-white">Barang</a></li>
          <li><a href="#" class="nav-link text-white">Supplier</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-white collapsed" data-bs-toggle="collapse"
        data-bs-target="#transaksi-collapse" aria-expanded="false">
        <i class="fa-solid fa-table"></i>
        <span class="px-2">Transaksi</span>
        <i class="fa-solid fa-angle-down float-end mt-1"></i>
      </a>
      <div class="collapse px-4 pw-2" id="transaksi-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-light small">
          <li><a href="#" class="nav-link text-white">Pemasukan</a></li>
          <li><a href="#" class="nav-link text-white">Pengeluaran</a></li>
        </ul>
      </div>
    </li>
  </ul>
  <hr>
  <small class="fw-lighter">SIDIA | Sistem Persediaan Barang</small>
</div>
