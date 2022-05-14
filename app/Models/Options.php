<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class options extends Model
{
    use HasFactory;
    protected $primaryKey = 'option_id';

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function optionvalue()
    {
        return $this->belongsTo('App\OptionValue');
    }
}
