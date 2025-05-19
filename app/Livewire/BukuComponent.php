<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use Livewire\WithPagination;

class BukuComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $judulbuku, $kategori, $pengarang, $penerbit, $status, $id, $cari;

    public function render()
    {
        $layout['title'] = "Kelola Buku";

        if ($this->cari != "") {
            $data['buku'] = Buku::where('judulbuku', 'like', '%' . $this->cari . '%')
                ->orWhere('kategori', 'like', '%' . $this->cari . '%')
                ->orWhere('pengarang', 'like', '%' . $this->cari . '%')
                ->orWhere('penerbit', 'like', '%' . $this->cari . '%')
                ->paginate(5);
        } else {
            $data['buku'] = Buku::paginate(5);
        }

        return view('livewire.buku-component', $data)->layoutData($layout);
    }

    public function store()
    {
        $this->validate([
            'judulbuku' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'status' => 'required',
        ], [
            'judulbuku.required' => 'Judul Buku Tidak Boleh Kosong!',
            'kategori.required' => 'Kategori Tidak Boleh Kosong!',
            'pengarang.required' => 'Pengarang Tidak Boleh Kosong!',
            'penerbit.required' => 'Penerbit Tidak Boleh Kosong!',
            'status.required' => 'Status Tidak Boleh Kosong!',
        ]);

        Buku::create([
            'judulbuku' => $this->judulbuku,
            'kategori' => $this->kategori,
            'pengarang' => $this->pengarang,
            'penerbit' => $this->penerbit,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Buku Berhasil Disimpan');
        $this->reset();
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $this->judulbuku = $buku->judulbuku;
        $this->kategori = $buku->kategori;
        $this->pengarang = $buku->pengarang;
        $this->penerbit = $buku->penerbit;
        $this->status = $buku->status;
        $this->id = $buku->id;
    }

    public function update()
    {
        $buku = Buku::find($this->id);

        $buku->update([
            'judulbuku' => $this->judulbuku,
            'kategori' => $this->kategori,
            'pengarang' => $this->pengarang,
            'penerbit' => $this->penerbit,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Buku Berhasil Diubah!');
        $this->reset();
    }

    public function confirm($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $buku = Buku::find($this->id);
        $buku->delete();

        session()->flash('success', 'Buku Berhasil Dihapus!');
        $this->reset();
    }
}
