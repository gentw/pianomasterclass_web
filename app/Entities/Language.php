<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'cms_languages';

    protected $fillable = ['order'];

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'languables');
    }

}