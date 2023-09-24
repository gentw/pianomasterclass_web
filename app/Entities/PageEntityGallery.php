<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PageEntityGallery  extends Model
{
    protected $table = 'cms_gallery_entity';

    public function images (){
        return $this->hasMany(PageGalleryImages::class, 'gallery_id');
    }

    public function field (){
        return $this->belongsTo(PageFields::class, 'field_id');
    }


}