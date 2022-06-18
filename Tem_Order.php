<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tem_Order extends Model
{
    protected $primaryKey = 'kd_brg';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "view_temp_order";
    protected $fillable = ['kd_brg', 'nm_brg', 'harga', 'sub_total'];
}
