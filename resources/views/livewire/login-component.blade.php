<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                <div class="card my-5 text-center rounded-5">
                <h1 class="text-center text-dark">SILAHKAN LOGIN</h1>
                <h2>SISTEM PERPUSTAKAAN</h2>
                <form class="card-body cardbody-color p-lg-5" wire:submit.prevent="proses">
                    <div class="text-center">
                        <img src="{{ asset('asset/logo-perpustakaan3.png') }}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                    </div>
                    <div class="mb-3">
                        <input type="text" wire:model="username" class="form-control" name="username" placeholder="Username">
                        @error('username')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" wire:model="password" class="form-control" name="password" placeholder="Password">
                        @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-color px-5 mb-3 w-100">Login</button>
                    </div>
                    <div id="emailHelp" class="form-text text-center mb-5">Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a></div>
                </form>
            </div>
        </div>
    </div>
</div>