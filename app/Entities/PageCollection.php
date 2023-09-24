<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PageCollection  extends Model
{
    protected $table = 'cms_pages_collections';

    protected $casts = [ 'value' => 'array', ];

    protected $fillable = ['value'];


    public function entity (){
        return $this->belongsTo(PageEntity::class, 'entity_id');
    }

     public function field (){
        return $this->belongsTo(PageFields::class, 'field_id');
    }

}
