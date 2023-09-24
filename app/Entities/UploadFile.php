<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;


class UploadFile  extends Model
{
    protected $table = 'uploaded_files';

    protected $fillable = ['file_name'];


   

}
