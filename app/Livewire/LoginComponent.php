<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{
    public $username,$password;
    public function render()
    {
        return view('livewire.login-component')->layout('components.layouts.login');
    }
    public function proses()
    {
        $credential = $this->validate([
            'username'=>'required',
            'password'=>'required',
        ], [
            'username.required'=>'Username Tidak Boleh Kosong!',
            'password.required'=>'Password Tidak Boleh Kosong!',
        ]);
        
        if (Auth::attempt($credential)) {
            session()->regenerate();
 
            return redirect()->route('home');
        }
        return back()->withErrors([
            'username' => 'Autentikasi Gagal!',
        ])->onlyInput('username');
    }

    public function keluar(){
        Auth::logout();
 
    session()->invalidate();
 
    session()->regenerateToken();
 
    return redirect('login');
    }
}
