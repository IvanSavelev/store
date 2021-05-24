<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model
{
	protected $table = 'products_to_category';
  protected $primaryKey = 'id_products_to_category';
	protected $fillable = ['id_product', 'id_category'];
}
