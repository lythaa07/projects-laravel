<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerSupplier extends Controller
{
    public function index()
    {
        $supplier = DB::table('supplier')->get();

        return view('Supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('Supplier.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => ['required', 'string', 'max:255', 'unique:supplier,kode'],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'string', 'max:255'],
            'perusahaan' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
        ]);

        DB::table('supplier')->insert([
            ...$validated,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil ditambahkan');
    }

    public function edit($kode)
    {
        $supplier = DB::table('supplier')->where('kode', $kode)->first();
        abort_if($supplier === null, 404);

        return view('Supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $kode)
    {
        abort_if(DB::table('supplier')->where('kode', $kode)->doesntExist(), 404);

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'string', 'max:255'],
            'perusahaan' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
        ]);

        DB::table('supplier')->where('kode', $kode)->update([
            ...$validated,
            'updated_at' => now(),
        ]);

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diperbarui');
    }

    public function destroy($kode)
    {
        $deleted = DB::table('supplier')->where('kode', $kode)->delete();
        abort_if($deleted === 0, 404);

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil dihapus');
    }
}
