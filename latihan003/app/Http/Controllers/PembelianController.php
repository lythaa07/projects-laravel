<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function hitungpembelian()
    {
        return view('pembelian');
    }

    public function hitung(Request $request)
    {
        $namabarang = $request->namabarang;
        $harga = $request->harga;
        $jumlah = $request->jumlah;
        $diskon = $request->diskon; // misalnya 10
        $total = $harga * $jumlah;
        $nilai_diskon = $total * ($diskon / 100);
        $totalharga = $total - $nilai_diskon;

        echo "Total Harga: " . $totalharga;
    }
}