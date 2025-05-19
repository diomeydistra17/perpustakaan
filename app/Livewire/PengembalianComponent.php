<?php

namespace App\Livewire;

use App\Models\Transaksi;
use App\Models\Pengembalian;
use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;

class PengembalianComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $layout['title'] = "Pengembalian Buku";
        $data['transaksi'] = Transaksi::with(['buku', 'anggota', 'pengembalian'])->paginate(5);

        return view('livewire.pengembalian-component', $data)->layoutData($layout); // atau layout lain milikmu
    }

    public function kembalikan($id)
    {
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            // Update status buku
            $transaksi->buku->update(['status' => 'Tersedia']);

            // Update status anggota
            $transaksi->anggota->update(['status' => 'Tidak Meminjam']);

            // (opsional) tambahkan kolom tglkembali_sesungguhnya jika ingin catat tanggal
            $transaksi->update([
                'status' => 'Dikembalikan', // tambahkan jika punya kolom status
            ]);

            Pengembalian::create([
                'transaksi_id' => $transaksi->id,
                'tgl_pengembalian' => now(),
            ]);

            session()->flash('success', 'Buku berhasil dikembalikan!');
        }
    }
}
