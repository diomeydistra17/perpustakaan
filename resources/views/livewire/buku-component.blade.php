<div>
    <div class="card">
        <div class="card-header">
            <h4>Kelola Buku</h4>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <input type="text" wire:model.live="cari" class="form-control w-50 mb-2" placeholder="Cari Buku...">

            <div class="table-responsive ">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $data)
                            <tr>
                                <th>{{ ($buku->currentPage() - 1) * $buku->perPage() + $loop->iteration }}</th>
                                <td>{{ $data->judulbuku }}</td>
                                <td>{{ $data->kategori }}</td>
                                <td>{{ $data->pengarang }}</td>
                                <td>{{ $data->penerbit }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a href="#" wire:click="edit({{ $data->id }})" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editPage">Edit</a>
                                    <a href="#" wire:click="confirm({{ $data->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusPage">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $buku->links() }}

            <div class="mt-3">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPage">Tambah Buku</a>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div wire:ignore.self class="modal fade" id="addPage" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group mb-2">
                                <label>Judul Buku</label>
                                <input type="text" class="form-control" wire:model="judulbuku">
                                @error('judulbuku') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Kategori</label>
                                <input type="text" class="form-control" wire:model="kategori">
                                @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Pengarang</label>
                                <input type="text" class="form-control" wire:model="pengarang">
                                @error('pengarang') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" wire:model="penerbit">
                                @error('penerbit') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Status</label>
                                <select class="form-control" wire:model="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Dipinjam">Dipinjam</option>
                                </select>
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" wire:click="store" data-bs-dismiss="modal">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div wire:ignore.self class="modal fade" id="editPage" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group mb-2">
                                <label>Judul Buku</label>
                                <input type="text" class="form-control" wire:model="judulbuku">
                                @error('judulbuku') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Kategori</label>
                                <input type="text" class="form-control" wire:model="kategori">
                                @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Pengarang</label>
                                <input type="text" class="form-control" wire:model="pengarang">
                                @error('pengarang') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" wire:model="penerbit">
                                @error('penerbit') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Status</label>
                                <select class="form-control" wire:model="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Dipinjam">Dipinjam</option>
                                </select>
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" wire:click="update" data-bs-dismiss="modal">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div wire:ignore.self class="modal fade" id="hapusPage" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus buku ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button class="btn btn-danger" wire:click="destroy" data-bs-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
