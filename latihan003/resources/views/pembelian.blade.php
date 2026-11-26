<!DOCTYPE html>
<html>
<head>
    <title>Pembelian Sederhana</title>
</head>
<body>
    <h2>Pembelian</h2>

    <form action="hitung" method="POST">
        @csrf
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br><br> 
        <label>Harga Barang:</label><br>
        <input type="number" name="harga" required><br><br>
        <label>Jumlah Beli:</label><br>
        <input type="number" name="jumlah" required><br><br>
        <label>Diskon:</label><br>
        <input type="number" name="diskon" required><br><br>
        <button type="submit">Total Harga</button>
    </form>
</body>
</html>