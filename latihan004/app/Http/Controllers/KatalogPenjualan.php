<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
        public function katalog()
    {
        $katalogBarang = [
            [
                'kode' => 'BRG-01',
                'nama_item' => 'Mechanical Keyboard RGB',
                'kategori' => 'Aksesoris',
                'harga' => 450000,
                'diskon_persen' => 15
            ],
            [
                'kode' => 'BRG-02',
                'nama_item' => 'Wireless Mouse Ergonomis',
                'kategori' => 'Aksesoris',
                'harga' => 175000,
                'diskon_persen' => 25
            ],
            [
                'kode' => 'BRG-03',
                'nama_item' => 'Monitor LED 24 Inch',
                'kategori' => 'Hardware',
                'harga' => 1850000,
                'diskon_persen' => 10
            ],
            [
                'kode' => 'BRG-04',
                'nama_item' => 'External SSD 512GB',
                'kategori' => 'Storage',
                'harga' => 950000,
                'diskon_persen' => 20
            ],
            [
                'kode' => 'BRG-05',
                'nama_item' => 'USB-C Hub Multiport',
                'kategori' => 'Aksesoris',
                'harga' => 220000,
                'diskon_persen' => 5
            ]
        ];

        return view('penjualan.katalog', compact('katalogBarang'));
    }
}