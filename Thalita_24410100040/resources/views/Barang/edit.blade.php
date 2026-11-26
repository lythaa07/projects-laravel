<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Barang</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>

<body class="bg-light">

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header bg-warning">
            <h5 class="mb-0">Form Edit Barang</h5>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('barang.update', $barang->kode) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" class="form-control"
                           value="{{ $barang->kode }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('nama', $barang->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control"
                           value="{{ old('kategori', $barang->kategori) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control"
                           value="{{ old('harga', $barang->harga) }}" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control"
                           value="{{ old('stok', $barang->stok) }}" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan', $barang->keterangan) }}</textarea>
                </div>

                <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-warning">
                    Update
                </button>

                <button type="submit"
                        form="barang-delete-form"
                        class="btn btn-danger">
                    Hapus
                </button>

            </form>

            <form id="barang-delete-form"
                  action="{{ route('barang.destroy', $barang->kode) }}"
                  method="POST"
                  class="d-none"
                  onsubmit="return confirm('Yakin ingin menghapus barang ini?')">

                @csrf
                @method('DELETE')

            </form>

        </div>
    </div>

</div>

</body>
</html>