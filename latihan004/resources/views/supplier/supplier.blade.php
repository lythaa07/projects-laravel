@extends('layouts.main')

@section('title', 'Data Supplier')

@section('content')
<button type="button" onclick="window.location.href='{{ url('/tampil1') }}'">Item</button>
<button type="button" onclick="window.location.href='{{ url('/karyawan') }}'">Karyawan</button>
<button type="button" onclick="window.location.href='{{ url('/supplier') }}'">Supplier</button>
<button type="button" onclick="window.location.href='{{ url('/penjualan') }}'">Penjualan</button>
<h2>Data Supplier</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>No.Telepon</th>
        </tr>
    </thead>
    <tbody>
        @forelse($supplier as $s)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s['nama'] }}</td>
            <td>{{ $s['alamat'] }}</td>
            <td>{{ $s['no_telepon'] }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align: center;">Tidak ada data supplier.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 20px;">
    <p><strong>Total Supplier:</strong> {{ count($supplier) }}</p>
</div>

@endsection