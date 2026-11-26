<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Konsumen</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
</head>

<body class="bg-light">
<div class="container py-4">

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Konsumen</h5>

            <div class="d-flex gap-2">
                <a href="{{ route('karyawan.index') }}" class="btn btn-light btn-sm">
                    Menu Karyawan
                </a>
                <a href="{{ route('supplier.index') }}" class="btn btn-light btn-sm">
                    Menu Supplier
                </a>
                <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm">
                    Menu Barang
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
                <a href="{{ route('Konsumen.create') }}" class="btn btn-success btn-sm">
                    + Tambah Konsumen
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th width="150">Action</th>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Kecamatan</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Telepon</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody id="tableData">
                        @forelse($Konsumen as $data)
                        <tr>
                            <td class="text-nowrap">
                                <a href="{{ route('Konsumen.edit', $data->kode) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->kota }}</td>
                            <td>{{ $data->kecamatan }}</td>
                            <td>{{ $data->rt }}</td>
                            <td>{{ $data->rw }}</td>
                            <td>{{ $data->telp }}</td>
                            <td>{{ $data->keterangan }}</td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted">
                                Belum ada data Konsumen.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>