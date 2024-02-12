<div class="container">
  <header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
      @foreach ($navs as $key => $nav)
        <li class="nav-item">
          <a
            href="{{ $nav['path'] }}"
            {{ $attributes->class(['nav-link', 'active' => $key === $currentPage]) }}
          >
            {{ $nav['name'] }}
          </a>
        </li>
      @endforeach
    </ul>
  </header>
</div>
