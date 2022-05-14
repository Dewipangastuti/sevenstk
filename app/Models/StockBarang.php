<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StockBarang extends Model
{
    public function allData()
    {
        return DB::table('stock_barangs')
            ->leftJoin('details', 'details.id', '=', 'stock_barangs.id_detail')
            ->leftJoin('varians', 'varians.id', '=', 'stock_barangs.id_varian')
            ->get();
    }
}
