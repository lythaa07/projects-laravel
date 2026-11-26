<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Konsumen</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
</head>

<body class="bg-light">
<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Form Tambah Konsumen</h5>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('Konsumen.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Konsumen</label>
                    <input type="text" name="kode" class="form-control"
                        placeholder="Masukkan kode Konsumen"
                        value="{{ old('kode') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Konsumen</label>
                    <input type="text" name="nama" class="form-control"
                        placeholder="Masukkan nama Konsumen"
                        value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control"
                        placeholder="Masukkan alamat Konsumen" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <br>
                    <select class="form-select" name="kota" required>
                        <option value="SBY" @selected(old('kota') == 'SBY')>SBY</option>
                        <option value="JKT" @selected(old('kota') == 'JKT')>JKT</option>
                        <option value="DIY" @selected(old('kota') == 'DIY')>DIY</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kecamatan</label>
                    <br>
                    <select class="form-select" name="kecamatan" required>
                        <option value="SBY Pusat" @selected(old('kecamatan') == 'SBY Pusat')>SBY Pusat</option>
                        <option value="JKT Pusat" @selected(old('kecamatan') == 'JKT Pusat')>JKT Pusat</option>
                        <option value="DIY Pusat" @selected(old('kecamatan') == 'DIY Pusat')>DIY Pusat</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">RT</label>
                    <br>
                    <select class="form-select" name="rt" required>
                        <option value="001" @selected(old('rt') == '001')>001</option>
                        <option value="002" @selected(old('rt') == '002')>002</option>
                        <option value="003" @selected(old('rt') == '003')>003</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">RW</label>
                    <br>
                    <select class="form-select" name="rw" required>
                        <option value="001" @selected(old('rw') == '001')>001</option>
                        <option value="002" @selected(old('rw') == '002')>002</option>
                        <option value="003" @selected(old('rw') == '003')>003</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="number" name="telp" class="form-control"
                        placeholder="Masukkan nomor telepon"
                        value="{{ old('telp') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control"
                        placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('Konsumen.index') }}" class="btn btn-secondary">
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