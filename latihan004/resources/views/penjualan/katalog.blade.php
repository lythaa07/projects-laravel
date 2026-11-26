@extends('layouts.main')

@section('title', 'Katalog Item Barang')

@section('content')
<button type="button" onclick="window.location.href='{{ url('/tampil1') }}'">Item</button>
<button type="button" onclick="window.location.href='{{ url('/karyawan') }}'">Karyawan</button>
<button type="button" onclick="window.location.href='{{ url('/supplier') }}'">Supplier</button>
<button type="button" onclick="window.location.href='{{ url('/penjualan') }}'">Penjualan</button>
<button type="button" onclick="window.location.href='{{ url('/katalog') }}'">Katalog</button>
<div class="card">
    <h3>Katalog Produk & Daftar Diskon Item</h3>
    <p>Berikut adalah daftar barang lengkap dengan perhitungan harga bersih setelah dipotong diskon.</p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Item</th>
                <th>Kategori</th>
                <th>Harga Normal</th>
                <th>Diskon</th>
                <th>Harga Bersih</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                @php
                    $jumlahDiskon = ($item['harga'] * $item['diskon_persen']) / 100;
                    $hargaBersih = $item['harga'] - $jumlahDiskon;
                @endphp
                
                {{-- Memberikan warna latar belakang merah muda jika diskon >= 20% --}}
                <tr style="{{ $item['diskon_persen'] >= 20 ? 'background-color: #ffc8c8;' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td><span class="badge">{{ $item['kode'] }}</span></td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['kategori'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>{{ $item['diskon_persen'] }}%</td>
                    <td><strong>Rp {{ number_format($hargaBersih, 0, ',', '.') }}</strong></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Katalog barang kosong.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection