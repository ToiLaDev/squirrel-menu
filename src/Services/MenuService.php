<?php

namespace Squirrel\Menu\Services;

use App\Services\RepositoryService;
use Squirrel\Menu\Repositories\MenuRepository;
use Illuminate\Support\Facades\Auth;

class MenuService extends RepositoryService implements MenuServiceImpl
{

    public function __construct(MenuRepository $menuRepo) {
        $this->firstRepo = $menuRepo;
    }

    public function createFromRequest($request)
    {
        $attributes = $request->only(['title', 'url', 'target', 'parent_id']);

        $menu = $this->firstRepo->create($attributes);

        return $menu;
    }

    public function updateFromRequest(int $id, $request)
    {
        $attributes = $request->only(['title', 'url', 'target', 'parent_id']);

        $menu = $this->firstRepo->update($id, $attributes);

        return $menu;
    }

    public function sortFromRequest($request)
    {
        $data = $request->get('sort');

        $this->firstRepo->model()->rebuildTree($data);
    }

    public function allMenus()
    {
        return $this->firstRepo->newQuery()->withDepth()->defaultOrder()->get();
    }

    public function widget($name)
    {
        $menu = $this->firstRepo->newQuery()->whereTitle($name)->first();
        return $menu?$this->firstRepo->newQuery()->defaultOrder()->withDepth()->descendantsOf($menu->id):null;
    }

    public function toSelect($menus) {
        $menus = $menus->toFlatTree();
        $options = [];
        foreach ($menus as $menu) {
            $options[] = [
                'title' => $this->depthName($menu->title, $menu->depth),
                'value' => $menu->id
            ];
        }
        return $options;
    }

    public function toTree($menus) {
        return $menus->toTree();
    }

    protected function depthName($name, $depth, $prefix = '-') {
        while ($depth > 0) {
            $depth--;
            $name = $prefix . $name;
        }
        return $name;
    }

}