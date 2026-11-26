
<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
<body class="bg-light">

<div class="container py-4">

        <div class="card shadow-sm">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Penjualan</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('karyawan.index') }}" class="btn btn-light btn-sm">
                    Menu Karyawan
                </a>
                <a href="{{ route('supplier.index') }}" class="btn btn-light btn-sm">
                    Menu Supplier
                </a>
                <a href="{{ route('Konsumen.index') }}" class="btn btn-light btn-sm">
                    Menu Konsumen
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
                <a href="{{ route('penjualan.create') }}" class="btn btn-success btn-sm">
                    + Tambah Penjualan
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Penjualan</th>
                            <th>Tanggal</th>
                            <th>Nama Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Metode Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($penjualan as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-nowrap">{{ $p->kode_penjualan }}</td>
                            <td class="text-nowrap">{{ $p->tanggal }}</td>
                            <td>{{ $p->nama_pelanggan }}</td>
                            <td class="text-nowrap">
                                Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                            </td>
                            <td>{{ $p->metode_pembayaran }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('penjualan.edit', $p->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('penjualan.destroy', $p->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                Belum ada data penjualan
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
