<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp_Order extends Model
{
    protected $primaryKey = 'kd_brg';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "temp_order";
    protected $fillable = ['kd_brg', 'qty_pesan'];
}
