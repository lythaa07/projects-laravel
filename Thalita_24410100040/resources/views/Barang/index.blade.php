<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Barang</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>

<body class="bg-light">

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card shadow-sm">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Barang</h5>
            <div class="d-flex gap-3">
                <a href="{{ route('karyawan.index') }}" class="btn btn-light btn-sm">
                    Menu Karyawan
                </a>
                <a href="{{ route('supplier.index') }}" class="btn btn-light btn-sm">
                    Menu Supplier
                </a>
                <a href="{{ route('supplier.index') }}" class="btn btn-light btn-sm">
                    Menu Konsumen
                </a>
            </div>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('barang.create') }}" class="btn btn-success btn-sm">
                    + Tambah Barang
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>Action</th>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($barang as $data)
                        <tr>
                            <td class="text-nowrap">
                                <a href="{{ route('barang.edit', $data->kode) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                            <td>{{ $data->stok }}</td>
                            <td>{{ $data->keterangan }}</td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                Belum ada data barang.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>