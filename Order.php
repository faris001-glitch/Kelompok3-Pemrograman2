<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //jika tidak di definisikan makan primary akan terdetek id
    protected $primaryKey = 'no_order';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "order";
    protected $fillable = ['no_order', 'tgl_order', 'kd_supp', 'total'];
}
