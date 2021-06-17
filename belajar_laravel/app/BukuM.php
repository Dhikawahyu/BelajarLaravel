<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuM extends Model
{
    protected $table = 'penjual';
    protected $primaryKey = 'id_penjual';
    public $timestamps = false;

    protected $fillable = [
    	'id_penjual', 'nama','id_barang'
    ];
}
