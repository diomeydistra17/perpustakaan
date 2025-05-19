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

    public function edit()
    {
        $this->editMode = true;
    }

    public function cancel()
    {
        $this->editMode = false;

        // Reset ulang ke session / nilai awal
        $this->tempat_lahir = session('tempat_lahir', '');
        $this->tanggal_lahir = session('tanggal_lahir', '');
        $this->jenis_kelamin = session('jenis_kelamin', '');
        $this->no_hp = session('no_hp', '');
        $this->password = null;
        $this->password_confirmation = null;
    }

    public function updateProfil()
    {
        $this->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'password' => 'nullable|min:6|same:password_confirmation',
        ]);

        $user = Auth::user();
        $user->nama = $this->nama;
        $user->alamat = $this->alamat;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        // Simpan data tambahan ke session
        session([
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'no_hp' => $this->no_hp,
        ]);

        $this->editMode = false;
        $this->reset('password', 'password_confirmation');
        session()->flash('success', 'Profil berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.profil-component');
    }
}
