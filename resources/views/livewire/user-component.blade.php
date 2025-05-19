<div>
<div class="card">
  <div class="card-header">
    <h4>Kelola User</h4>
  </div>
  <div class="card-body">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
</div>
    @endif
    <input type="text" wire:model.live="cari" class="form-control w-50 mb-2" placeholder="Cari...">
    
  <table class="table table-bordered table-striped">
  <div class="table-responsive">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Username</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Jenis</th>
      <th>Proses</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $user as $data )
    <t>
    <th scope="row">{{ ($user->currentPage() - 1) * $user->perPage() + $loop->iteration }}</th>
      <td>{{ $data->username }}</td>
      <td>{{ $data->nama }}</td>
      <td>{{ $data->email }}</td>
      <td>{{ $data->jenis }}</td>
      <td>
        <a href="#" wire:click="edit({{ $data->id }})" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editPage">Edit</a>
        <a href="#" wire:click="confirm({{ $data->id }})" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPage">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
  </div>
</table>
{{ $user->links() }}
<div>
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPage">Tambah</a>
</div>
</div>
<!-- Tambah -->
<div wire:ignore.self class="modal fade" id="addPage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" wire:model="username" value="{{ @old('username') }}">
                @error('username')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" wire:model="nama" value="{{ @old('nama') }}">
                @error('nama')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" wire:model="email" value="{{ @old('email') }}">
                @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" wire:model="password" value="{{ @old('password') }}">
                @error('password')
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
  <!-- Edit -->
<div wire:ignore.self class="modal fade" id="editPage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" wire:model="username" value="{{ @old('username') }}">
                @error('username')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" wire:model="nama" value="{{ @old('nama') }}">
                @error('nama')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" wire:model="email" value="{{ @old('email') }}">
                @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" wire:model="password" value="{{ @old('password') }}">
                @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
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
<!-- Hapus -->
<div wire:ignore.self class="modal fade" id="hapusPage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Yakin Ingin Hapus Data?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" wire:click="destroy" class="btn btn-primary" data-bs-dismiss="modal">Ya</button>
      </div>
    </div>
  </div>
</div>

</div>
</div>