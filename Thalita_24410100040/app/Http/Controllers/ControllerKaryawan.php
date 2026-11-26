<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ControllerKaryawan extends Controller
{
    public function index()
    {
        $karyawan = DB::table('karyawan')->get();
        return view('Karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('Karyawan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => ['required', 'string', 'max:255', 'unique:karyawan,kode'],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'pendidikan' => ['required', 'string', 'max:255'],
        ]);

        DB::table('karyawan')->insert([
            ...$validated,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function edit($kode)
    {
        $karyawan = DB::table('karyawan')->where('kode', $kode)->first();
        abort_if($karyawan === null, 404);

        return view('Karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $kode)
    {
        abort_if(DB::table('karyawan')->where('kode', $kode)->doesntExist(), 404);

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'pendidikan' => ['required', 'string', 'max:255'],
        ]);

        DB::table('karyawan')->where('kode', $kode)->update([
            ...$validated,
            'updated_at'    => now(),
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($kode)
    {
        $deleted = DB::table('karyawan')->where('kode', $kode)->delete();
        abort_if($deleted === 0, 404);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}