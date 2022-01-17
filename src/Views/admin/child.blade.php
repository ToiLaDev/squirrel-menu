<li id="menuItem_{{$menu->id}}" data-id="{{$menu->id}}">
    <div>
        <span class="item-move">
            <i class="fa fa-arrows-alt"></i>
        </span>
        {{ $menu->title }}
        <span class="float-end">
            <a class="item-edit btn btn-sm btn-icon btn-flat-success" href="{{ route('admin.menus.edit', $menu->id) }}">
                <i class="fa fa-edit"></i>
            </a>
            <button class="item-delete btn btn-sm btn-icon btn-flat-danger">
                <i class="fa fa-trash-alt"></i>
            </button>
        </span>
    </div>
    @if($menu->children)
        <ol>
            @foreach($menu->children as $children)
                @include('Menu::admin.child', ['menu' => $children])
            @endforeach
        </ol>
    @endif
</li>
