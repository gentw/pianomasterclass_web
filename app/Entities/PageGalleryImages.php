<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PageGalleryImages  extends Model
{
    protected $table = 'cms_gallery_images';


    protected $fillable = ['order'];


    public function entity (){
        return $this->belongsTo(PageEntityGallery::class, 'gallery_id');
    }
}