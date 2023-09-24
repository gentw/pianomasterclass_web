<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PageTypeCategory extends Model
{
	protected $fillable = ['name', 'description', 'slug', 'type_id'];
	protected $table = 'cms_page-type_categories';

    protected $casts = [ 'name' => 'array' ];


    /*
     * Has many categories 
     */
    public function pageType() {
        return $this->belongsTo(PageType::class);
    }
}
