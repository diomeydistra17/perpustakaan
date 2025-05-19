<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'tgl_kembali',
        // tambahkan kolom lain jika ada
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}

