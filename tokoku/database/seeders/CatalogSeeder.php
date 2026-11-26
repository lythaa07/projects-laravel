<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Elektronik', 'Aksesoris Komputer', 'Peralatan Kantor', 'Buku Pemrograman'];

        foreach ($categories as $categoryName) {
            $category = Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
            ]);

            // Setiap kategori memiliki 4 produk tersedia dan 1 produk habis (outOfStock)
            Product::factory()->count(4)->for($category)->create();
            Product::factory()->count(1)->outOfStock()->for($category)->create();
        }
    }
}