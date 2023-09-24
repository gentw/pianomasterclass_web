<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Baum;

class Page  extends Baum\Node
{
    protected $table = 'cms_pages';
    protected $casts = [ 'name' => 'array', ];


    public function types(){
        return $this->hasMany(PageType::class);
    }


}
