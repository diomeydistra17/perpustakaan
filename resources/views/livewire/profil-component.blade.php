<div class="container mt-4">
    <h2>Profil Saya</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (!$editMode)
        <div class="card p-4 w-50">
            <p><strong>Nama:</strong> {{ $nama }}</p>
            <p><strong>Username:</strong> {{ $username }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Alamat:</strong> {{ $alamat }}</p>
        </div>
    @else
        <form wire:submit.prevent="updateProfil" class="w-50">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" wire:model="nama" class="form-control">
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" value="{{ $username }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ $email }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea wire:model="alamat" class="form-control"></textarea>
                @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password Baru</label>
                <input type="password" wire:model="password" class="form-control">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi Password Baru</label>
                <input type="password" wire:model="password_confirmation" class="form-control">
                @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <button type="button" class="btn btn-secondary ms-2" wire:click="cancel">Batal</button>
        </form>
    @endif
</div>
