<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $primaryKey = 'no_jurnal';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "jurnal";
    protected $fillable = ['no_jurnal', 'tgl_jurnal', 'keterangan', 'no_akun', 'debet', 'kredit'];
}
