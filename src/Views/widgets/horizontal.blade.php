<ul class="nav navbar-nav ms-auto nav-menu">
    @foreach($menus as $menu)
    <li class="nav-item dropdown" data-menu="dropdown">
        <a
           href="{{ $menu->url }}"
           class="nav-link d-flex align-items-center @if($menu->children) dropdown-toggle @endif"
           target="{{ $menu->target }}"
           @if($menu->children)
           data-bs-toggle="dropdown"
           @endif
        >
            <span class="fw-bold">{{ $menu->title }}</span>
        </a>
        @if($menu->children)
        <ul class="dropdown-menu" data-bs-popper="none">
            @foreach($menu->children as $menu)
            @include('Menu::widgets.horizontal-child', ['menu' => $menu])
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>