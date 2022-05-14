<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSkus extends Model
{
    use HasFactory;
    protected $primaryKey = 'sku_id';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function skuvalue()
    {
        return $this->belongsTo('App\SkuValue');
    }
}
