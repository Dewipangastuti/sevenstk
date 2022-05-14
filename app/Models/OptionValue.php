<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;
    protected $primaryKey = 'value_id';

    public function options()
    {
        return $this->HasMany('App\Options');
    }

    public function skuvalue()
    {
        return $this->belongTo('App\SkuValue');
    }
}
