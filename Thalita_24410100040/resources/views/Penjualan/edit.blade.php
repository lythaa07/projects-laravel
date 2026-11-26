
<!DOCTYPE html>
<html>
<head>
    <title>Edit Penjualan</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
<body class="bg-light">

<div class="container py-4">

    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Penjualan</h4>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Penjualan</label>
                    <input type="text" name="kode_penjualan"
                           class="form-control"
                           value="{{ old('kode_penjualan', $penjualan->kode_penjualan) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal', $penjualan->tanggal) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan"
                           class="form-control"
                           value="{{ old('nama_pelanggan', $penjualan->nama_pelanggan) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Harga</label>
                    <input type="number" name="total_harga"
                           class="form-control"
                           value="{{ old('total_harga', $penjualan->total_harga) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-control" required>
                        <option value="Tunai" {{ $penjualan->metode_pembayaran == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                        <option value="Transfer" {{ $penjualan->metode_pembayaran == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                        <option value="QRIS" {{ $penjualan->metode_pembayaran == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                    </select>
                </div>
                 <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan', $penjualan->keterangan) }}</textarea>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>

                    <button type="submit" form="Konsumen-delete-form" class="btn btn-danger">
                        Hapus
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
