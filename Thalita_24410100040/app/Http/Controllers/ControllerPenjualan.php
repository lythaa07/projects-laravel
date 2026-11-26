<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerPenjualan extends Controller
{
    public function index()
    {
        $penjualan = DB::table('penjualan')->get();

        return view('Penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        return view('Penjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penjualan' => 'required|unique:penjualan,kode_penjualan',
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required',
            'total_harga' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required',
            'keterangan' => 'nullable'
        ]);

        DB::table('penjualan')->insert([
            'kode_penjualan' => $request->kode_penjualan,
            'tanggal' => $request->tanggal,
            'nama_pelanggan' => $request->nama_pelanggan,
            'total_harga' => $request->total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penjualan = DB::table('penjualan')->where('id', $id)->first();

        return view('Penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_penjualan' => 'required|unique:penjualan,kode_penjualan,' . $id . ',id',
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required',
            'total_harga' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required',
            'keterangan' => 'nullable'
        ]);

        DB::table('penjualan')->where('id', $id)->update([
            'kode_penjualan' => $request->kode_penjualan,
            'tanggal' => $request->tanggal,
            'nama_pelanggan' => $request->nama_pelanggan,
            'total_harga' => $request->total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'keterangan' => $request->keterangan,
            'updated_at' => now()
        ]);

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil diubah');
    }

    public function destroy($id)
    {
        DB::table('penjualan')->where('id', $id)->delete();

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil dihapus');
    }
}
