<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';
	protected $primaryKey = 'id_category';
	protected $fillable = ['id_page_standard_field', 'image', 'id_parent', 'sort_order','visible', 'description'];

	public function products()
  {
    return $this->belongsToMany('App\Models\Product', 'products_to_category', 'id_category', 'id_product');
  }

  public static function getIdNext()
  {
    return \App\Http\Helpers\Model\Model::getNextAutoIncrement((new Category())->table);
  }
}
