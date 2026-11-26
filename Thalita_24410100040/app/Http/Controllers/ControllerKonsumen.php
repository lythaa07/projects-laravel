<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerKonsumen extends Controller
{
    public function index()
    {
        $Konsumen = DB::table('Konsumen')->get();

        return view('Konsumen.index', compact('Konsumen'));
    }

    public function create()
    {
        return view('Konsumen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => ['required', 'string', 'max:255', 'unique:Konsumen,kode'],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'kota' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'rw' => ['required', 'string'],
            'rt' => ['required', 'string'],
            'telp' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
        ]);

        DB::table('Konsumen')->insert([
            ...$validated,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('Konsumen.index')->with('success', 'Data Konsumen berhasil ditambahkan');
    }

    public function edit($kode)
    {
        $Konsumen = DB::table('Konsumen')->where('kode', $kode)->first();
        abort_if($Konsumen === null, 404);

        return view('Konsumen.edit', compact('Konsumen'));
    }

    public function update(Request $request, $kode)
    {
        abort_if(DB::table('Konsumen')->where('kode', $kode)->doesntExist(), 404);

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'kota' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'rw' => ['required', 'string'],
            'rt' => ['required', 'string'],
            'telp' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
        ]);

        DB::table('Konsumen')->where('kode', $kode)->update([
            ...$validated,
            'updated_at' => now(),
        ]);

        return redirect()->route('Konsumen.index')->with('success', 'Data Konsumen berhasil diupdate');
    }

    public function destroy($kode)
    {
        $deleted = DB::table('Konsumen')->where('kode', $kode)->delete();
        abort_if($deleted === 0, 404);

        return redirect()->route('Konsumen.index')->with('success', 'Data Konsumen berhasil dihapus');
    }
}
