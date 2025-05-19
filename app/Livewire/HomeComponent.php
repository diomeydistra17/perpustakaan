<?php

namespace App\Livewire;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pengembalian;
use App\Models\Transaksi;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $x['title']="Home Perpustakaan";
        $data ['anggota']=Anggota::count();
        $data ['anggota_peminjam']=Anggota::where('status', 'Sedang Meminjam')->count();
        $data ['buku']=Buku::count();
        $data ['buku_tersedia']=Buku::where('status', 'Tersedia')->count();
        $data ['buku_dipinjam']=Buku::where('status', 'Dipinjam')->count();
        $data ['peminjaman']=Transaksi::count();
        $data ['pengembalian']=Pengembalian::count();
        return view('livewire.home-component',$data)->layoutData($x);
    }
}
