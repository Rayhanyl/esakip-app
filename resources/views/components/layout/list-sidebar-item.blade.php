<li class="submenu-item {{ Route::is($route) ? 'active' : '' }}">
    <a href="{{ route($route) }}">
        {{ $slot }}
    </a>
</li>
