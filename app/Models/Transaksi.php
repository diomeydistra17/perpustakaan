<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['idanggota', 'idbuku', 'tglpinjam', 'tglkembali'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'idanggota');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idbuku');
    }

    public function pengembalian()
{
    return $this->hasOne(Pengembalian::class);
}
}
