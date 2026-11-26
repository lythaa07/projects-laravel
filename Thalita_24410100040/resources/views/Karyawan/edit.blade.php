
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Karyawan</title>
    <link href="{{ asset('public/assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('public/assets/jquery.min.js') }}"></script>
</head>
<body class="container py-4">
    <h1 class="h3 mb-4">Edit Karyawan</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="karyawan-update-form" action="{{ route('karyawan.update', $karyawan->kode) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode" class="form-label">Kode Karyawan</label>
            <input id="kode" type="text" class="form-control" value="{{ $karyawan->kode }}" readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Karyawan</label>
            <input id="nama" type="text" name="nama" class="form-control" value="{{ old('nama', $karyawan->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" required>{{ old('alamat', $karyawan->alamat) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">Nomor Telepon</label>
            <input id="telp" type="number" name="telp" class="form-control" value="{{ old('telp', $karyawan->telp) }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}" required>
        </div>
        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <input id="pendidikan" type="text" name="pendidikan" class="form-control" value="{{ old('pendidikan', $karyawan->pendidikan) }}" required>
        </div>

        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="submit" form="karyawan-delete-form" class="btn btn-danger">
            Hapus
        </button>
    </form>

    <form id="karyawan-delete-form" action="{{ route('karyawan.destroy', $karyawan->kode) }}"
        method="POST" class="d-none"
        onsubmit="return confirm('Yakin ingin menghapus data karyawan ini?')">
        @csrf
        @method('DELETE')
    </form>
</body>
</html>
