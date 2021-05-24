<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';
  protected $primaryKey = 'id_product';
  protected $fillable = ['id_page_standard_field', 'model', 'image', 'price', 'description'];

  public function category()
  {
    return $this->belongsToMany('App\Models\Category', 'products_to_category', 'id_product', 'id_category');
  }

  public static function getIdNext()
  {
    return \App\Http\Helpers\Model\Model::getNextAutoIncrement((new Product())->table);
  }

}
