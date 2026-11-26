<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerBarang extends Controller
{
    // READ
    public function index()
    {
        $barang = DB::table('barang')->get();

        return view('Barang.index', compact('barang'));
    }

    // CREATE
    public function create()
    {
        return view('Barang.create');
    }

    // INSERT
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => ['required', 'string', 'max:255', 'unique:barang,kode'],
            'nama' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'keterangan' => ['nullable', 'string'],
        ]);

        DB::table('barang')->insert([
            ...$validated,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil ditambahkan');
    }

    // EDIT
    public function edit($kode)
    {
        $barang = DB::table('barang')
            ->where('kode', $kode)->first();

        abort_if($barang === null, 404);

        return view('Barang.edit', compact('barang'));
    }

    // UPDATE
    public function update(Request $request, $kode)
    {
        abort_if(
            DB::table('barang')->where('kode', $kode)->doesntExist(),
            404
        );

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'keterangan' => ['nullable', 'string'],
        ]);

        DB::table('barang')->where('kode', $kode)->update([
            ...$validated,
            'updated_at' => now(),
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui');
    }

    // DELETE
    public function destroy($kode)
    {
        $deleted = DB::table('barang')
            ->where('kode', $kode)->delete();

        abort_if($deleted === 0, 404);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil dihapus');
    }
}