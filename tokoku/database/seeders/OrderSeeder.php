<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customers = User::where('email', '!=', 'admin@tokoku.test')->get();
        $availableProducts = Product::where('stock', '>', 0)->get();

        // Buat 15 transaksi acak yang didistribusikan ke pelanggan yang ada
        Order::factory()
            ->count(15)
            ->recycle($customers)
            ->create()
            ->each(function (Order $order) use ($availableProducts) {
                // Ambil 1 hingga 3 produk acak untuk setiap transaksi
                $selectedProducts = $availableProducts->random(rand(1, 3));
                $grandTotal = 0;

                foreach ($selectedProducts as $product) {
                    $qty = rand(1, 3);
                    $unitPrice = $product->price;

                    // Simpan relasi ke tabel pivot beserta kolom quantity & unit_price
                    $order->products()->attach($product->id, [
                        'quantity' => $qty,
                        'unit_price' => $unitPrice,
                    ]);

                    $grandTotal += ($qty * $unitPrice);
                }

                // Perbarui total_amount pada tabel orders agar konsisten dengan rincian pivot
                $order->update(['total_amount' => $grandTotal]);
            });
    }
}