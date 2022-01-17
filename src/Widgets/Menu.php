<?php

namespace Squirrel\Menu\Widgets;

use Squirrel\Menu\Services\MenuService;

class Menu
{

    public static function vertical($name) {
        $menuService = app()->make(MenuService::class);
        $menus = $menuService->widget($name);
        echo widgetView('vertical', [
            'menus'    => $menuService->toTree($menus)
        ]);
    }

    public static function horizontal($name) {
        $menuService = app()->make(MenuService::class);
        $menus = $menuService->widget($name);
        echo widgetView('horizontal', [
            'menus'    => $menuService->toTree($menus)
        ]);
    }
}