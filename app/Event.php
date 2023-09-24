<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'first_name', 'last_name', 'event_title', 'start_date', 'end_date'
    ];
}
