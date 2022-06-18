<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBarangMasuk extends Model
{
    protected $primaryKey = 'no_bm';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "detail_barang_masuk";
    protected $fillable = ['no_bm', 'kd_brg', 'qty_bm', 'sub_bm'];
}
