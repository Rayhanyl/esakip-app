<li class="submenu-item {{ Route::is($grouproute.'*') ? 'active' : '' }}">
    <a href="{{ route($route) }}">
        {{ $slot }}
    </a>
</li>