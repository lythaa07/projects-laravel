<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Barang</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>

<body class="bg-light">

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Form Tambah Barang</h5>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('barang.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" name="kode" class="form-control"
                           value="{{ old('kode') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control"
                           value="{{ old('kategori') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control"
                           value="{{ old('harga') }}" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control"
                           value="{{ old('stok') }}" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                </div>

                <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-success">
                    Simpan Data
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>