
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Karyawan</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
</head>
<body class="container py-4">
    <h1 class="h3 mb-3">Data Karyawan</h1>
    <a href="{{ route('supplier.index') }}" class="btn btn-secondary mb-3">Menu Supplier</a>
    <a href="{{ route('karyawan.create') }}" class="btn btn-warning mb-3">Tambah Karyawan</a>
    <a href="{{ route('Konsumen.index') }}" class="btn btn-primary mb-3">Menu Konsumen</a>
    <a href="{{ route('barang.index') }}" class="btn btn-success mb-3">Menu Barang</a>
    <a href="{{ route('penjualan.index') }}"class="btn btn-danger mb-3">Menu Penjualan</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Tanggal Lahir</th>
                <th>Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($karyawan as $data)
            <tr>
                
                <td>
                    <a href="{{ route('karyawan.edit', $data->kode) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('karyawan.destroy', $data->kode) }}" method="POST"
                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                </td>
                <td>{{ $data->kode }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->telp }}</td>
                <td>{{ $data->tanggal_lahir }}</td>
                <td>{{ $data->pendidikan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data karyawan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
