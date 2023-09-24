<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PageType  extends Model
{
    protected $table = 'cms_pages_types';

    protected $fillable = ['edit'];


    /**
     * Page Relation
     */
    public function page(){
        return $this->belongsTo(Page::class);
    }

    /**
     * Has many fields
     */
    public function fields(){
        return $this->hasMany(PageFields::class);
    }


    /**
     * Has many entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entities(){
        return $this->hasMany(PageEntity::class, 'type_id');
    }

    /*
     * Has many categories 
     */
    public function categories() {
        return $this->hasMany(PageTypeCategory::class, 'type_id');
    }
}