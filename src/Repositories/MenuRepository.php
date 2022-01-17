<?php

namespace Squirrel\Menu\Repositories;

use App\Repositories\Repository;
use Squirrel\Menu\Models\Menu;

class MenuRepository extends Repository implements MenuRepositoryImpl
{
    public function __construct(Menu $menu) {
        $this->_model = $menu;
    }
}