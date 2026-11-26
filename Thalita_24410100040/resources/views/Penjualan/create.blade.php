
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penjualan</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
<body class="bg-light">

<div class="container py-4">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Penjualan</h4>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Penjualan</label>
                    <input type="text" name="kode_penjualan"
                           class="form-control"
                           value="{{ old('kode_penjualan') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan"
                           class="form-control"
                           value="{{ old('nama_pelanggan') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Harga</label>
                    <input type="number" name="total_harga"
                           class="form-control"
                           value="{{ old('total_harga') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-control" required>
                        <option value="">-- Pilih Pembayaran --</option>
                        <option value="Tunai">Tunai</option>
                        <option value="Transfer">Transfer</option>
                        <option value="QRIS">QRIS</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>
