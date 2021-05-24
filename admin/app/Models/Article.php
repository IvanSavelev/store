<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';
	protected $primaryKey = 'id_article';
	protected $fillable = ['id_page_standard_field', 'image',  'sort_order','visible', 'description'];

  public static function getIdNext()
  {
    return \App\Http\Helpers\Model\Model::getNextAutoIncrement((new Article())->table);
  }
}
