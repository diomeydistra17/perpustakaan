<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $i => $data)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $data->anggota->nama }}</td>
                    <td>{{ $data->anggota->jeniskelamin }}</td>
                    <td>{{ $data->anggota->alamat }}</td>
                    <td>{{ $data->buku->judulbuku }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tglpinjam)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tglkembali)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
