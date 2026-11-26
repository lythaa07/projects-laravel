<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form action="{{ url('/calculator/add') }}" method="post">
        @csrf
        <input type="number" name="number1" placeholder="Angka 1" required>
        <input type="number" name="number2" placeholder="Angka 2" required>
        <button type="submit">Tambah</button>
    </form>
    <form action="{{ url('/calculator/subtract') }}" method="post">
        @csrf
        <input type="number" name="number1" placeholder="Angka 1" required>
        <input type="number" name="number2" placeholder="Angka 2" required>
        <button type="submit">Kurang</button>
    </form>
    <form action="{{ url('/calculator/multiply') }}" method="post">
        @csrf
        <input type="number" name="number1" placeholder="Angka 1" required>
        <input type="number" name="number2" placeholder="Angka 2" required>
        <button type="submit">Kali</button>
    </form>
    <form action="{{ url('/calculator/divide') }}" method="post">
        @csrf
        <input type="number" name="number1" placeholder="Angka 1" required>
        <input type="number" name="number2" placeholder="Angka 2" required>
        <button type="submit">Bagi</button>
    </form>
</body>
</html>