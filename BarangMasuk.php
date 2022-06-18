<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $primaryKey = 'no_bm';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "barang_masuk";
    protected $fillable = ['no_bm', 'tgl_bm', 'nobm', 'total', 'no_order'];
}
