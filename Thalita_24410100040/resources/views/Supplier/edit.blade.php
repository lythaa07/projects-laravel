
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Supplier</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
</head>

<body class="bg-light">
<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header bg-warning">
            <h5 class="mb-0">Form Edit Supplier</h5>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form id="supplier-update-form" action="{{ route('supplier.update', $supplier->kode) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Supplier</label>
                    <input type="text" class="form-control"
                        value="{{ $supplier->kode }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Supplier</label>
                    <input type="text" name="nama" class="form-control"
                        value="{{ old('nama', $supplier->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control"
                        required>{{ old('alamat', $supplier->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="number" name="telp" class="form-control"
                        value="{{ old('telp', $supplier->telp) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Perusahaan</label>
                    <input type="text" name="perusahaan" class="form-control"
                        value="{{ old('perusahaan', $supplier->perusahaan) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan', $supplier->keterangan) }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>

                    <button type="submit" form="supplier-delete-form" class="btn btn-danger">
                        Hapus
                    </button>
                </div>
            </form>

            <form id="supplier-delete-form" action="{{ route('supplier.destroy', $supplier->kode) }}"
                method="POST" class="d-none"
                onsubmit="return confirm('Yakin ingin menghapus supplier?')">
                @csrf
                @method('DELETE')
            </form>

        </div>
    </div>

</div>

</body>
</html>
