<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    
    public $table = "barang";
    use HasFactory;

    protected $fillable = [
        'merk_barang',
        'jumlah_barang',
        'harga',
        'deskripsi',
        'id_kategori',
        'gambar',
    ];

    protected $primaryKey = 'id_barang';
}
