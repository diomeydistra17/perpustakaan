<div>
<div id="dashboard" class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-header"><span data-feather="users"></span> Anggota</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $anggota }}</h5>
                        <p class="card-text">Anggota Meminjam: {{ $anggota_peminjam }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white mb-3">
                    <div class="card-header"><span data-feather="book"></span> Buku</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $buku }}</h5>
                        <p class="card-text">Buku Yang Tersedia: {{ $buku_tersedia }}</p>
                        <p class="card-text">Buku yang dipinjam: {{ $buku_dipinjam }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white mb-3">
                    <div class="card-header"><span data-feather="file-text"></span> Peminjaman</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $peminjaman }}</h5>


                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white mb-3">
                    <div class="card-header"><span data-feather="refresh-ccw"></span> Pengembalian</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $pengembalian }}</h5>

                    </div>
                </div>
            </div>
        </div>
</div>
