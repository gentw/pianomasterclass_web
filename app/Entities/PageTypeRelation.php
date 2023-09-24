<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PageTypeRelation extends Model
{
    protected $fillable = ['from_id', 'to_id', 'type'];
	protected $table = 'cms_pagetype_rel';
	public $timestamps = false;
}
