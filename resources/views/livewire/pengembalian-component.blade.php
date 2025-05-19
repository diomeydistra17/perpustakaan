<div>
    <h4>Daftar Buku yang Dipinjam</h4>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $item)
                <tr>
                    <td>{{ $item->anggota->nama }}</td>
                    <td>{{ $item->buku->judulbuku }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tglpinjam)->format('d-m-Y') }}</td>
                    <td>
    @if ($item->pengembalian)
        <span class="badge bg-secondary">Telah Dikembalikan</span>
    @else
        <button wire:click="kembalikan({{ $item->id }})" class="btn btn-sm btn-success">
            Kembalikan
        </button>
    @endif
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $transaksi->links() }}
</div>
