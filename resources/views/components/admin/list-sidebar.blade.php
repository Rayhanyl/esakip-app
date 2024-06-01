<li class="sidebar-item {{ Route::is($route) ? 'active' : '' }}">
    <a href="{{ route($route) }}" class="sidebar-link">
        <i class="bi bi-{{ $icon }}"></i>
        <span>{{ $slot }}</span>
    </a>
</li>
