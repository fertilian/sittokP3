<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    public $table = "jual";
    
    use HasFactory;

    protected $fillable = [
        'total',
        'total_final',
        'alamat',
        'nohp',
        'bukti_bayar',
        'status',
        'id_customer',
        'nama_lengkap',
    ];

    protected $primaryKey = 'id_jual';

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id_keranjang');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }


    public function barang()
{
    return $this->belongsTo(Barang::class, 'id_barang');
}

    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->no_pesanan = 'STK' . uniqid();
    });
}
}
