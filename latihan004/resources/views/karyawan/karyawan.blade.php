@extends('layouts.main')

@section('title', 'Data Karyawan')

@section('content')

<button type="button" onclick="window.location.href='{{ url('/tampil1') }}'">Item</button>
<button type="button" onclick="window.location.href='{{ url('/karyawan') }}'">Karyawan</button>
<button type="button" onclick="window.location.href='{{ url('/supplier') }}'">Supplier</button>
<button type="button" onclick="window.location.href='{{ url('/penjualan') }}'">Penjualan</button>
<h2>Data Karyawan</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>Gaji</th>
        </tr>
    </thead>
    <tbody>
        @forelse($karyawan as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k['nama'] }}</td>
            <td>{{ $k['jabatan'] }}</td>
            <td>Rp {{ number_format($k['gaji'], 0, ',', '.') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align: center;">Tidak ada data karyawan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 20px;">
    <p><strong>Total Karyawan:</strong> {{ count($karyawan) }}</p>
</div>

@endsection