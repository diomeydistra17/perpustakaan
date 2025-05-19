<?php

use App\Http\Controllers\LaporanTransaksiController;
use App\Livewire\PengembalianComponent;
use App\Livewire\AnggotaComponent;
use App\Livewire\BukuComponent;
use App\Livewire\HomeComponent;
use App\Livewire\LoginComponent;
use App\Livewire\TransaksiComponent;
use App\Livewire\UserComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\ProfilComponent;

Route::get('/', HomeComponent::class)->middleware('auth')->name('home');
Route::get('/user',UserComponent::class)->name('user')->middleware('auth');
Route::get('/anggota',AnggotaComponent::class)->name('anggota')->middleware('auth');
Route::get('/buku',BukuComponent::class)->name('buku')->middleware('auth');
Route::get('/transaksi',TransaksiComponent::class)->name('transaksi')->middleware('auth');
Route::get('/pengembalian', PengembalianComponent::class)->name('pengembalian');
Route::get('/cetak-laporan', [LaporanTransaksiController::class, 'cetak'])->name('laporan.cetak');
Route::get('/profil', ProfilComponent::class)->name('profil');
// Route::get('')



Route::get('/login',LoginComponent::class)->name('login');
Route::get('/logout',[LoginComponent::class,'keluar'])->name('logout');