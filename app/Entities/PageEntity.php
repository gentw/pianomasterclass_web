<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PageEntity  extends Model
{
    protected $table = 'cms_pages_entities';

    protected $casts = [ 'slugable' => 'array', ];

    protected $fillable = ['slugable', 'order'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collections (){
        return $this->hasMany(PageCollection::class, 'entity_id');
    }

    public function galleries (){
        return $this->hasMany(PageEntityGallery::class, 'entity_id');
    }

    public function type (){
        return $this->belongsTo(PageType::class, 'type_id');
    }

}