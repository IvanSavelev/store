<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageStandardField extends Model
{
   protected $table = 'pages_standard_field';
    protected $primaryKey = 'id_page_standard_field';
    protected $fillable = ['id_page_standard_field', 'image', 'title', 'h1','meta_title', 'meta_description'];

}

