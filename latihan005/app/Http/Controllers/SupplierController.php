<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
       public function supplier()
    {
        $supplier = [
            ['id' => 1, 'nama' => 'Jayden', 'alamat' => 'Jl. Mangga A No. 1', 'no_telepon' => '081234567890'],
            ['id' => 2, 'nama' => 'Aden', 'alamat' => 'Jl. Manggis B No. 2', 'no_telepon' => '081234567891'],
            ['id' => 3, 'nama' => 'Andhika', 'alamat' => 'Jl. Rambutan C No. 3', 'no_telepon' => '081234567892'],
            ['id' => 4, 'nama' => 'Aurel', 'alamat' => 'Jl. Salak D No. 4', 'no_telepon' => '081234567893'],
            ['id' => 5, 'nama' => 'Budi', 'alamat' => 'Jl. Pepaya E No. 5', 'no_telepon' => '081234567894'],
        ];

        return view('supplier.supplier', compact('supplier'));
    }
}