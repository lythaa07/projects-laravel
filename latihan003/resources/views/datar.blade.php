<!DOCTYPE html>
<html>
<head>
    <title>Hitung Bangun Datar</title>
</head>
<body>
    <h2>Hitung Luas & Keliling Persegi</h2>
    <form action="{{ url('/hitung-persegi') }}" method="POST">
        @csrf
        <label>Sisi:</label><br>
        <input type="number" name="sisi" required><br><br>
        <button type="submit" name="Hitung" value="Luaspersegi">Hitung Persegi</button>
        <button type="submit" name="Hitung" value="Kelilingpersegi">Hitung Keliling Persegi</button>
    </form>
    <hr>
    <h2>Hitung Luas & Keliling Lingkaran</h2>
    <form action="hitung-lingkaran" method="POST">
        @csrf
        <label>Jari-jari (r):</label><br>
        <input type="number" name="jari_jari" required><br><br>
        <button type="submit" name="Hitung" value="Luaslingkaran">Hitung Lingkaran</button>
        <button type="submit" name="Hitung" value="Kelilinglingkaran">Hitung Keliling Lingkaran</button>
    </form>
</body>
</html>