<!DOCTYPE html>
<html>
    <body>
        <h1> Form Karyawan </h1>
        <form action="/insertkaryawan" method="post">
            @csrf
            <input type="text" name="kode" placeholder="kode"> <br>
            <input type="text" name="nama" placeholder="nama"> <br>
            <input type="text" name="umur" placeholder="umur"> <br>
            <button type="submit">Save</button>
        </form>
    </body>
</html>