<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_product';

    public function productskus()
    {
        return $this->hasMany('App\ProductSkus');
    }

    public function options()
    {
        return $this->belongsTo('App\Options');
    }
}
