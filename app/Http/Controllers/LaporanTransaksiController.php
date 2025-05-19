<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanTransaksiController extends Controller
{
    public function cetak()
    {
        $transaksis = Transaksi::with(['anggota', 'buku'])->get();

        $pdf = PDF::loadView('livewire.laporan-transaksi', compact('transaksis'))->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-transaksi.pdf'); // Bisa juga ->download(...)
    }
}
