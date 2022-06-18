<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $primaryKey = 'no_order';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "tampil_order";
    protected $fillable = ['kd_brg', 'no_order', 'nm_brg', 'qty_pesan', 'sub_total'];
}
