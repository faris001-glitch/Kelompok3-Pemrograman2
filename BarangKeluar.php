<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    //jika tidak di definisikan makan primary akan terdetek id
    protected $primaryKey = 'no_bk';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "barang_keluar";
    protected $fillable = ['no_bk', 'tgl_bk', 'ket_keluar', 'tbk'];
}
