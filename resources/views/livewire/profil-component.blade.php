<div class="container mt-4">
    <h2>Profil Saya</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (!$editMode)
        <div class="card p-4 w-50">
            <p><strong>Nama:</strong> {{ $nama }}</p>
            <p><strong>Username:</strong> {{ $username }}</p>
            <p><strong>Jenis:</strong> {{ $jenis }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Alamat:</strong> {{ $alamat }}</p>
            <p><strong>Tempat Lahir:</strong> {{ $tempat_lahir }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $tanggal_lahir }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $jenis_kelamin }}</p>
            <p><strong>No HP:</strong> {{ $no_hp }}</p>

            <button class="btn btn-primary mt-3" wire:click="edit">Edit Profil</button>
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
                <label class="form-label">Jenis</label>
                <input type="text" class="form-control" value="{{ $jenis }}" readonly>
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

            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" wire:model="tempat_lahir" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" wire:model="tanggal_lahir" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select wire:model="jenis_kelamin" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input type="text" wire:model="no_hp" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <button type="button" class="btn btn-secondary ms-2" wire:click="cancel">Batal</button>
        </form>
    @endif
</div>
