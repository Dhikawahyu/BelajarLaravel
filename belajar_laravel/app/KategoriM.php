<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriM extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;

    protected $fillable = [
    	'nama_barang', 'stok', 'id_kategori'
    ];
}
