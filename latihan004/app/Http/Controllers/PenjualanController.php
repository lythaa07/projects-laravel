<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function penjualan()
    {
        
        $items = [
            ['kode' => 'ITM-01', 'nama' => 'Flashdisk Sandisk 32GB', 'kategori' => 'Elektronik', 'harga' => 65000, 'diskon_persen' => 2],
            ['kode' => 'ITM-02', 'nama' => 'Headset Bluetooth JBL', 'kategori' => 'Elektronik', 'harga' => 250000, 'diskon_persen' => 25],
            ['kode' => 'ITM-03', 'nama' => 'Mousepad Gaming XL', 'kategori' => 'Elektronik', 'harga' => 85000, 'diskon_persen' => 10],
            ['kode' => 'ITM-04', 'nama' => 'Keyboard Mechanical RGB', 'kategori' => 'Elektronik', 'harga' => 450000, 'diskon_persen' => 15],
            ['kode' => 'ITM-05', 'nama' => 'Speaker Bluetooth Portable', 'kategori' => 'Elektronik', 'harga' => 350000, 'diskon_persen' => 20],
        ];

        return view('penjualan.katalog', compact('items'));
    }

}