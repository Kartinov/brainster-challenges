<ul class="nav nav-tabs mt-3">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}"
            href="{{ route('projects.index') }}">
            Измени
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('projects.create') ? 'active' : '' }}"
            href="{{ route('projects.create') }}">
            Додај
        </a>
    </li>
</ul>
