<?php

namespace Squirrel\Menu\Models;

use App\Models\Base;
use App\Traits\CastTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Base {
    use SoftDeletes,  NodeTrait;

    protected $table = 'menus';

    protected $fillable = ['title', 'url', 'target', 'parent_id', '_lft', '_rgt'];

}
