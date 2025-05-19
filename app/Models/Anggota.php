<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Anggota extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $fillable = ['nama', 'jeniskelamin', 'alamat', 'status'];

    // Menentukan relasi dengan model Transaksi jika diperlukan
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class,'idanggota');
    }
}
