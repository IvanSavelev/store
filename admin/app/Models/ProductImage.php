<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	protected $table = 'products_image';
	protected $primaryKey = 'id_product_image';
	protected $fillable = ['id_product_image', 'id_product', 'image', 'sort_order'];
}
