<?php

namespace App\Livewire;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;

class AnggotaComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $nama, $jeniskelamin, $alamat, $status, $id, $cari;

    public function render()
    {
        $layout['title'] = "Kelola Anggota";

        // Pencarian anggota
        if ($this->cari != "") {
            $data['anggota'] = Anggota::where('nama', 'like', '%' . $this->cari . '%')
                ->orWhere('jeniskelamin', 'like', '%' . $this->cari . '%')
                ->paginate(5);
        } else {
            $data['anggota'] = Anggota::paginate(5);
        }

        return view('livewire.anggota-component', $data)->layoutData($layout);
    }

    // Fungsi untuk mengedit anggota
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        $this->nama = $anggota->nama;
        $this->jeniskelamin = $anggota->jeniskelamin;
        $this->alamat = $anggota->alamat;
        $this->status = $anggota->status;
        $this->id = $anggota->id;
    }

    // Fungsi untuk memperbarui data anggota
    public function update()
    {
        $anggota = Anggota::find($this->id);
        $anggota->update([
            'nama' => $this->nama,
            'jeniskelamin' => $this->jeniskelamin,
            'alamat' => $this->alamat,
        ]);

        session()->flash('success', 'Berhasil diubah!');
        $this->reset();
    }

    // Fungsi konfirmasi sebelum menghapus
    public function confirm($id)
    {
        $this->id = $id;
    }

    // Fungsi untuk menghapus anggota
    public function destroy()
    {
        $anggota = Anggota::find($this->id);
    
        // Hapus semua transaksi terkait terlebih dahulu
        if ($anggota) {
            $anggota->transaksis()->delete(); // butuh relasi hasMany di model Anggota
            $anggota->delete();
            session()->flash('success', 'Data berhasil dihapus!');
        }
    
        $this->reset();
    }
}
