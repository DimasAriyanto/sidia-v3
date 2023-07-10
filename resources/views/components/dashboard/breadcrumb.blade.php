<nav aria-label="breadcrumb" class="shadow-sm">
  <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
    @foreach ($breadcrumb as $item)
      @if ($item['active'])
        <li class="breadcrumb-item active" aria-current="page">
          @if ($item['icon'])
            <i class="{{ $item['icon'] }}"></i>
          @endif
          {{ $item['name'] }}
        </li>
      @else
        <li class="breadcrumb-item">
          <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ $item['route'] ?: '#' }}">
            @if ($item['icon'])
              <i class="{{ $item['icon'] }}"></i>
            @endif
            {{ $item['name'] }}
          </a>
      @endif
      </li>
    @endforeach
  </ol>
</nav>
