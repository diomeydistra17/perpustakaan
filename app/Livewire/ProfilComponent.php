<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilComponent extends Component
{
    public $nama, $username, $email, $alamat, $jenis;
    public $password, $password_confirmation;

    // Data tambahan (tidak disimpan ke database)
    public $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $no_hp;

    public $editMode = false;

    public function mount()
    {
        $user = Auth::user();
        $this->nama = $user->nama;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->alamat = $user->alamat;
        $this->jenis = $user->jenis;

        // Ambil data tambahan dari session agar tidak hilang
        $this->tempat_lahir = session('tempat_lahir', '');
        $this->tanggal_lahir = session('tanggal_lahir', '');
        $this->jenis_kelamin = session('jenis_kelamin', '');
        $this->no_hp = session('no_hp', '');
    }
    public function render()
    {
        return view('livewire.profil-component');
    }
}
