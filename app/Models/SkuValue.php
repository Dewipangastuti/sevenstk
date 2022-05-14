<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SkuValue extends Model
{
    public function allData()
    {
        return DB::table('sku_values')
            ->leftJoin('products', 'products.id_product', '=', 'sku_values.id_product')
            ->leftJoin('product_skuses', 'product_skuses.sku_id', '=', 'sku_values.sku_id')
            ->leftJoin('options', 'options.option_id', '=', 'sku_values.option_id')
            ->leftJoin('option_values', 'option_values.value_id', '=', 'sku_values.value_id')
            ->leftJoin('stocks', 'stocks.id_product', '=', 'sku_values.id_product')
            ->get();
    }

    public function productskus()
    {
        return $this->hasMany('App\ProductSkus');
    }

    public function optionvalue()
    {
        return $this->hasMany('App\OptionValue');
    }
}
