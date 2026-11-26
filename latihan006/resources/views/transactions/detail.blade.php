<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Detail Penjualan</h2>
         <a href="{{ url('transactions/create') }}"><button type="button" class="btn btn-success btn-sm">Tambah</button></a>
        <a href="{{ url('transactions') }}"><button type="button" class="btn btn-primary btn-sm">Rekap</button></a>
        <a href="{{ url('transactions/detail') }}"><button type="button" class="btn btn-danger btn-sm">Rekap Detail</button></a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode </th>
                    <th>Tanggal </th>
                    <th>ID item</th>
                    <th>Nama Item</th>
                    <th>Deskripsi </th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->invoice_number }}</td>
                        <td>{{ $transaction->transaction_date }}</td>
                        <td>{{ $transaction->item_id }}</td>
                        <td>{{ $transaction->name }}</td>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->price }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->subtotal}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                </tr>
            </tfoot>
        </table>
        <div class="text-end"><strong>Total Transaksi=</strong>Rp {{ number_format(\DB::table('transactions_details')->sum('subtotal'),0,'.'.'.') }}</div>
    </div>
</body>
</html>