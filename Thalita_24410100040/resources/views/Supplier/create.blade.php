
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Supplier</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
</head>

<body class="bg-light">
<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Form Tambah Supplier</h5>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Supplier</label>
                    <input type="text" name="kode" class="form-control"
                        placeholder="Masukkan kode supplier"
                        value="{{ old('kode') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Supplier</label>
                    <input type="text" name="nama" class="form-control"
                        placeholder="Masukkan nama supplier"
                        value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control"
                        placeholder="Masukkan alamat supplier" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="number" name="telp" class="form-control"
                        placeholder="Masukkan nomor telepon"
                        value="{{ old('telp') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Perusahaan</label>
                    <input type="text" name="perusahaan" class="form-control"
                        placeholder="Masukkan nama perusahaan"
                        value="{{ old('perusahaan') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control"
                        placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        Simpan Data
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
