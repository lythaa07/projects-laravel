<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function hitungruang()
    {
        return view('ruang');
    }

    public function ruanghitung(Request $request)
    {
        $button = $request->Hitung;

        // --- BALOK ---
        if ($button == "Volumebalok") {
            $pjg = $request->panjang;
            $lbr = $request->lebar;
            $tgg = $request->tinggibalok;
            $volume = $pjg * $lbr * $tgg;
            echo "Volume Balok: " . $volume;
        } 
        elseif ($button == "Luasbalok") {
            $pjg = $request->panjang;
            $lbr = $request->lebar;
            $tgg = $request->tinggibalok;
            $luasPermukaan = 2 * (($pjg * $lbr) + ($pjg * $tgg) + ($lbr * $tgg));
            echo "Luas Permukaan Balok: " . $luasPermukaan;
        }

        // --- KUBUS ---
        elseif ($button == "Volumekubus") {
            $sisi = $request->sisi;
            $volume = $sisi * $sisi * $sisi;
            echo "Volume Kubus: " . $volume;
        } 
        elseif ($button == "Luaskubus") {
            $sisi = $request->sisi;
            $luasPermukaan = 6 * ($sisi * $sisi);
            echo "Luas Permukaan Kubus: " . $luasPermukaan;
        }

        // --- TABUNG ---
        elseif ($button == "Volumetabung") {
            $jari_jari = $request->jari_jari;
            $tinggi = $request->tinggi;
            $volume = 3.14 * $jari_jari * $jari_jari * $tinggi;
            echo "Volume Tabung: " . $volume;
        }
        elseif ($button == "Luastabung") {
            $jari_jari = $request->jari_jari;
            $tinggi = $request->tinggi;
            $luasPermukaan = 2 * 3.14 * $jari_jari * ($jari_jari + $tinggi);
            echo "Luas Permukaan Tabung: " . $luasPermukaan;
        }
    }
}