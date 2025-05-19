<nav class="sidebar bg-primary text-white">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}"><span data-feather="home"></span> Dashboard</a>
            </li>
            <li class="nav-item ">
                <!-- <a class="nav-link" href="#members"><span data-feather="users"></span> Manage Members</a> -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('buku') }}"><span data-feather="book"></span> Buku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('transaksi') }}"><span data-feather="file-text"></span> Peminjaman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengembalian') }}"><span data-feather="refresh-ccw"></span> Pengembalian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('anggota') }}"><span data-feather="users"></span> Anggota</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('user') }}"><span data-feather="user"></span> User</a>
            </li>
        </ul>
    </nav>

