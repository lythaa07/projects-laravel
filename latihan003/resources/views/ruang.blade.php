<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Bangun Ruang</title>
</head>
<body>
    <h2>Perhitungan Bangun Ruang Balok, Kubus, dan Tabung (Volume & Luas Permukaan)</h2>

    <form action="{{ url('/ruang') }}" method="POST">
        @csrf
        
        <!-- BALOK -->
        <h3>Balok</h3>
        <label>Panjang:</label><br>
        <input type="number" name="panjang"><br><br>
        
        <label>Lebar:</label><br>
        <input type="number" name="lebar"><br><br>
        
        <label>Tinggi:</label><br>
        <input type="number" name="tinggibalok"><br><br>
        
        <button type="submit" name="Hitung" value="Volumebalok">Hitung Volume Balok</button>
        <button type="submit" name="Hitung" value="Luasbalok">Hitung Luas Balok</button>

        <hr>

        <!-- KUBUS -->
        <h3>Kubus</h3>
        <label>Sisi:</label><br>
        <input type="number" name="sisi"><br><br>
        
        <button type="submit" name="Hitung" value="Volumekubus">Hitung Volume Kubus</button>
        <button type="submit" name="Hitung" value="Luaskubus">Hitung Luas Kubus</button>

        <hr>

        <!-- TABUNG -->
        <h3>Tabung</h3>
        <label>Jari-jari (r):</label><br>
        <input type="number" name="jari_jari"><br><br>
        
        <label>Tinggi:</label><br>
        <input type="number" name="tinggi"><br><br>
        
        <button type="submit" name="Hitung" value="Volumetabung">Hitung Volume Tabung</button>
        <button type="submit" name="Hitung" value="Luastabung">Hitung Luas Tabung</button>
    </form>
</body>
</html>