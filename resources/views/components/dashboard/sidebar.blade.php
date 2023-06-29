<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
  <a href="{{ route('dashboard.index') }}" class="py-1 px-3">
    <img width="100px" src="{{ asset('logo/sidia.png') }}" alt="{{ env('APP_NAME') }}">
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    @foreach ($menu as $m)
      @if (!isset($m['child']))
        <li class="nav-item">
          <a href="{{ $m['route'] }}" class="nav-link text-white">
            <i class="{{ $m['icon'] }}"></i>
            <span class="px-2">{{ $m['name'] }}</span>
          </a>
        </li>
      @else
        <li class="nav-item">
          <a href="{{ $m['route'] }}" class="nav-link text-white collapsed" data-bs-toggle="collapse"
            data-bs-target="#{{ $m['name'] }}-collapse" aria-expanded="false">
            <i class="{{ $m['icon'] }}"></i>
            <span class="px-2">{{ $m['name'] }}</span>
            <i class="fa-solid fa-angle-down float-end mt-1"></i>
          </a>
          <div class="collapse px-4 pw-2" id="{{ $m['name'] }}-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-light small">
              @foreach ($m['child'] as $child)
                <li><a href="{{ $child['route'] }}" class="nav-link text-white">{{ $child['name'] }}</a></li>
              @endforeach
            </ul>
          </div>
        </li>
      @endif
    @endforeach
  </ul>
  <hr>
  <small class="fw-lighter">SIDIA | Sistem Persediaan Barang</small>
</div>
