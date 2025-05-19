<?php

namespace App\Livewire;

use App\Models\Transaksi;
use App\Models\Buku;
use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;

class TransaksiComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idanggota, $idbuku, $tglpinjam, $tglkembali, $id, $cari;
    public $nama, $jeniskelamin, $alamat;

    public function render()
    {
        $layout['title'] = "Kelola Transaksi";

        if ($this->cari != "") {
            $data['transaksi'] = Transaksi::whereHas('anggota', function ($query) {
                $query->where('nama', 'like', '%' . $this->cari . '%');
            })
            ->orWhereHas('buku', function ($query) {
                $query->where('judulbuku', 'like', '%' . $this->cari . '%');
            })
            ->paginate(5);
        } else {
            $data['transaksi'] = Transaksi::paginate(5);
        }

        $data['buku'] = Buku::all();

        return view('livewire.transaksi-component', $data)->layoutData($layout);
    }

    public function store()
{

    $this->validate([
        'nama' => 'required|string',
        'jeniskelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string',
        'idbuku' => 'required',
        'tglpinjam' => 'required|date',
        'tglkembali' => 'required|date|after_or_equal:tglpinjam',
    ]);

    // Simpan anggota baru
    $anggota = Anggota::create([
        'nama' => $this->nama,
        'jeniskelamin' => $this->jeniskelamin,
        'alamat' => $this->alamat,
        'status' => 'Sedang Meminjam',
    ]);

    // Update status anggota
Anggota::where('id', $anggota->id)->update(['status' => 'Sedang Meminjam']);


    // Simpan transaksi terkait
    Transaksi::create([
        'idanggota' => $anggota->id,
        'idbuku' => $this->idbuku,
        'tglpinjam' => $this->tglpinjam,
        'tglkembali' => $this->tglkembali,
        // 'status' => 'Dipinjam',
    ]);

    Buku::where('id', $this->idbuku)->update([
        'status' => 'dipinjam',
    ]);


    session()->flash('success', 'Transaksi Berhasil Disimpan');
    $this->reset(); // Reset form setelah simpan

}


    public function edit($id)
    {
        $transaksi = Transaksi::find($id);

        $this->id = $transaksi->id;
        $this->idbuku = $transaksi->idbuku;
        $this->tglpinjam = $transaksi->tglpinjam;
        $this->tglkembali = $transaksi->tglkembali;

        // Ambil data anggota
        $this->idanggota = $transaksi->idanggota;
        $this->nama = $transaksi->anggota->nama;
        $this->jeniskelamin = $transaksi->anggota->jeniskelamin;
        $this->alamat = $transaksi->anggota->alamat;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string',
            'jeniskelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'idbuku' => 'required',
            'tglpinjam' => 'required|date',
            'tglkembali' => 'required|date|after_or_equal:tglpinjam',
        ]);
    
        $transaksi = Transaksi::find($this->id);
        $anggota = Anggota::find($this->idanggota);
    
        // Update data anggota
        if ($anggota) {
            $anggota->update([
                'nama' => $this->nama,
                'jeniskelamin' => $this->jeniskelamin,
                'alamat' => $this->alamat,
            ]);
        }
    
        // Update transaksi
        $transaksi->update([
            'idbuku' => $this->idbuku,
            'tglpinjam' => $this->tglpinjam,
            'tglkembali' => $this->tglkembali,
        ]);
    
        session()->flash('success', 'Transaksi Berhasil Diubah!');
        $this->reset(); // Reset form
    }

    public function confirm($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $transaksi = Transaksi::find($this->id);
    
        if ($transaksi) {
            // Ubah status anggota ke "Tidak Meminjam"
            Anggota::where('id', $transaksi->idanggota)->update(['status' => 'Tidak Meminjam']);
            
            $transaksi->delete();
        }
    
        session()->flash('success', 'Transaksi Berhasil Dihapus!');
        $this->reset();
    }
    
}
