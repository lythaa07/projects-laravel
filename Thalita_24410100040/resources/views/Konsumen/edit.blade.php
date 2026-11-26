<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Konsumen</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
</head>

<body class="bg-light">
<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header bg-warning">
            <h5 class="mb-0">Form Edit Konsumen</h5>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form id="Konsumen-update-form" action="{{ route('Konsumen.update', $Konsumen->kode) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Konsumen</label>
                    <input type="text" class="form-control"
                        value="{{ $Konsumen->kode }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Konsumen</label>
                    <input type="text" name="nama" class="form-control"
                        value="{{ old('nama', $Konsumen->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control"
                        required>{{ old('alamat', $Konsumen->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <br>
                    <select class="form-select" name="kota" required>
                        <option value="SBY" @selected(old('kota', $Konsumen->kota) == 'SBY')>SBY</option>
                        <option value="JKT" @selected(old('kota', $Konsumen->kota) == 'JKT')>JKT</option>
                        <option value="DIY" @selected(old('kota', $Konsumen->kota) == 'DIY')>DIY</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kecamatan</label>
                    <br>
                    <select class="form-select" name="kecamatan" required>
                        <option value="SBY Pusat" @selected(old('kecamatan', $Konsumen->kecamatan) == 'SBY Pusat')>SBY Pusat</option>
                        <option value="JKT Pusat" @selected(old('kecamatan', $Konsumen->kecamatan) == 'JKT Pusat')>JKT Pusat</option>
                        <option value="DIY Pusat" @selected(old('kecamatan', $Konsumen->kecamatan) == 'DIY Pusat')>DIY Pusat</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">RT</label>
                    <br>
                    <select class="form-select" name="rt" required>
                        <option value="001" @selected(old('rt', $Konsumen->rt) == '001')>001</option>
                        <option value="002" @selected(old('rt', $Konsumen->rt) == '002')>002</option>
                        <option value="003" @selected(old('rt', $Konsumen->rt) == '003')>003</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">RW</label>
                    <br>
                    <select class="form-select" name="rw" required>
                        <option value="001" @selected(old('rw', $Konsumen->rw) == '001')>001</option>
                        <option value="002" @selected(old('rw', $Konsumen->rw) == '002')>002</option>
                        <option value="003" @selected(old('rw', $Konsumen->rw) == '003')>003</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="number" name="telp" class="form-control"
                        value="{{ old('telp', $Konsumen->telp) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan', $Konsumen->keterangan) }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('Konsumen.index') }}" class="btn btn-secondary">
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

            <form id="Konsumen-delete-form" action="{{ route('Konsumen.destroy', $Konsumen->kode) }}"
                method="POST" class="d-none"
                onsubmit="return confirm('Yakin ingin menghapus Konsumen?')">
                @csrf
                @method('DELETE')
            </form>

        </div>
    </div>

</div>

</body>
</html>