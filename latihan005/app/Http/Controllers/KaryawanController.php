<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function karyawan()
    {
        $karyawan = [
            ['id' => '040', 'nama' => 'Thalita Rania', 'jabatan' => 'Manager', 'gaji' => 10000000],
            ['id' => '050', 'nama' => 'Josephine Joy', 'jabatan' => 'Staff', 'gaji' => 5000000],
            ['id' => '060', 'nama' => 'Rianda Aprilia', 'jabatan' => 'Supervisor', 'gaji' => 7000000],
            ['id' => '070', 'nama' => 'Cindy Valencia', 'jabatan' => 'Staff', 'gaji' => 5000000],
            ['id' => '080', 'nama' => 'Nabilah Nurulfalah', 'jabatan' => 'Supervisor', 'gaji' => 7000000],
        ];

        return view('karyawan.karyawan', compact('karyawan'));
    }
}