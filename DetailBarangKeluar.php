<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBarangKeluar extends Model
{
    protected $primaryKey = 'no_bk';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "detail_barang_keluar";
    protected $fillable = ['no_bk', 'kd_brg', 'qty_bk', 'sub_bk'];
}
