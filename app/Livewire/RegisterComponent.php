<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterComponent extends Component
{
    public $nama, $username, $email, $alamat, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.register-component')->layout('components.layouts.login');
    }

     public function register()
    {
        $this->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'nullable|string',
            'password' => 'required|min:6|same:password_confirmation',
        ]);

        User::create([
            'nama' => $this->nama,
            'username' => $this->username,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'jenis' => 'admin',
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registrasi berhasil. Silakan login.');
        return redirect()->route('login');
    }
}
