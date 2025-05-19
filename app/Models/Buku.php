<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Buku extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $fillable = ['judulbuku','kategori','pengarang', 'penerbit','status'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'idbuku');
    }
}

