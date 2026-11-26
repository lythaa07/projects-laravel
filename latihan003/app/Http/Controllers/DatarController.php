<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatarController extends Controller
{
    public function hitungdatar()
    {
        return view('datar');
    }
    public function datarhitung(Request $request)
    {
        $sisi = $request->sisi;
        $button = $request->Hitung;
        if ($button == "Luaspersegi") {
           $luas = $sisi * $sisi;
           echo "Luas Persegi: " . $luas;
        } elseif ($button == "Kelilingpersegi") {
            $keliling = 4 * $sisi;
            echo "Keliling Persegi: " . $keliling;
        }
    }
    public function hitungLingkaran(Request $request)
    {
        $jari_jari = $request->jari_jari;
        $button = $request->Hitung;
        if ($button == "Luaslingkaran") {
            $luas = 3.14 * $jari_jari * $jari_jari;
            echo "Luas Lingkaran: " . $luas;
        } elseif ($button == "Kelilinglingkaran") {
        $keliling = 2 * 3.14 * $jari_jari;
        echo "Keliling Lingkaran: " . $keliling;
    }
}
}