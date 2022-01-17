<?php

namespace Squirrel\Menu;

use App\Traits\ModuleServiceProviderTrait;
use Squirrel\Menu\Widgets\Menu;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    use ModuleServiceProviderTrait;

    private $permissions = [
        'view'         => 'View Menu',
        'create'       => 'Create Menu',
        'edit'         => 'Edit Menu',
        'delete'       => 'Delete Menu'
    ];

    private $appendAdminMenus = [
        'content' => [
            'menu' => [
                'title'     => 'Menus',
                'icon'      => 'list',
                'permission'=> 'menu.view',
                'route'     => 'admin.menus.index',
            ]
        ]
    ];

    private $widgets = [
        'menus-vertical'   => [Menu::class, 'vertical'],
        'menus-horizontal'   => [Menu::class, 'horizontal'],
    ];

}
