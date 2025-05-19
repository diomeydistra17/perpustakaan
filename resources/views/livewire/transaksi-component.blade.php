<div>
    <div class="card">
        <div class="card-header">
            <h4>Peminjaman</h4>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <input type="text" wire:model="cari" class="form-control w-50 mb-2" placeholder="Cari...">

            <table class="table table-bordered table-striped">
                <div class="table-responsive">
                <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Anggota</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Alamat</th>
        <th scope="col">Buku</th>
        <th scope="col">Tanggal Pinjam</th>
        <th scope="col">Tanggal Kembali</th>
        <th>Status</th>
    </tr>
</thead>

<tbody>
    @foreach ($transaksi as $data)
        <tr>
            <th scope="row">{{ ($transaksi->currentPage() - 1) * $transaksi->perPage() + $loop->iteration }}</th>
            <td>{{ $data->anggota->nama }}</td>
            <td>{{ $data->anggota->jeniskelamin }}</td>
            <td>{{ $data->anggota->alamat }}</td>
            <td>{{ $data->buku->judulbuku }}</td>
            <td>{{ \Carbon\Carbon::parse($data->tglpinjam)->format('d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($data->tglkembali)->format('d-m-Y') }}</td>
            <td>
                <!-- <a href="#" wire:click="edit({{ $data->id }})" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editPage">Edit</a> -->
                <!-- <a href="#" wire:click="confirm({{ $data->id }})" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPage">Hapus</a> -->
                @if ($data->buku->status == 'Dipinjam') 
        <span class="badge bg-warning text-dark">Dipinjam</span>
    @else 
        <span class="badge bg-success">Dikembalikan</span>
    @endif
            </td>
        </tr>
    @endforeach
</tbody>
                </div>
            </table>
            {{ $transaksi->links() }}
            <div>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPage">Tambah</a>
            </div>
            <a href="{{ route('laporan.cetak') }}" target="_blank" class="btn btn-danger mt-1">Cetak Laporan</a>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="addPage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
    <label>Nama Anggota</label>
    <input type="text" class="form-control" wire:model="nama">
    @error('nama') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>

<div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" wire:model="jeniskelamin">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    @error('jeniskelamin') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>

<div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control" wire:model="alamat"></textarea>
    @error('alamat') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>

                        <div class="form-group">
                            <label>Buku</label>
                            <select class="form-control" wire:model="idbuku">
                                <option value="">Pilih Buku</option>
                                @foreach ($buku as $bukuItem)
                                    <option value="{{ $bukuItem->id }}">{{ $bukuItem->judulbuku }}</option>
                                @endforeach
                            </select>
                            @error('idbuku')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" class="form-control" wire:model="tglpinjam">
                            @error('tglpinjam')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" class="form-control" wire:model="tglkembali">
                            @error('tglkembali')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" wire:click="store" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div wire:ignore.self class="modal fade" id="editPage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Anggota Section -->
                    <div class="form-group mb-2">
                        <label>Nama Anggota</label>
                        <input type="text" class="form-control" wire:model="nama" readonly>
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" wire:model="jeniskelamin" readonly>
                        @error('jeniskelamin') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Alamat</label>
                        <textarea class="form-control" wire:model="alamat" readonly></textarea>
                        @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Transaksi Section -->
                    <div class="form-group mb-2">
                        <label>Buku</label>
                        <select class="form-control" wire:model="idbuku">
                            <option value="">-- Pilih Buku --</option>
                            @foreach($buku as $item)
                                <option value="{{ $item->id }}">{{ $item->judulbuku }}</option>
                            @endforeach
                        </select>
                        @error('idbuku') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" wire:model="tglpinjam">
                        @error('tglpinjam') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Tanggal Kembali</label>
                        <input type="date" class="form-control" wire:model="tglkembali">
                        @error('tglkembali') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" wire:click="update" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>


    <!-- Modal Hapus -->
    <div wire:ignore.self class="modal fade" id="hapusPage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin Ingin Menghapus Transaksi Ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" wire:click="destroy" class="btn btn-primary" data-bs-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>
