<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Main Categories
        $elektronik = Category::create([
            'name' => 'Elektronik',
            'slug' => Str::slug('Elektronik'),
            'icon' => 'fa fa-laptop',
            'banner' => 'frontend/image/catalog/menu/banner-1.jpg',
            'sort_order' => 1
        ]);

        $furniture = Category::create([
            'name' => 'Furniture',
            'slug' => Str::slug('Furniture'),
            'icon' => 'fa fa-bed',
            'banner' => 'frontend/image/catalog/menu/banner-2.jpg',
            'sort_order' => 2
        ]);

        $fashion = Category::create([
            'name' => 'Fashion',
            'slug' => Str::slug('Fashion'),
            'icon' => 'fa fa-female',
            'banner' => 'frontend/image/catalog/menu/banner-3.jpg',
            'sort_order' => 3
        ]);

        // 2. Create Subcategories for Elektronik
        $smartphone = Category::create([
            'parent_id' => $elektronik->id,
            'name' => 'Smartphone',
            'slug' => Str::slug('Smartphone'),
            'sort_order' => 1
        ]);
        $laptop = Category::create([
            'parent_id' => $elektronik->id,
            'name' => 'Laptop',
            'slug' => Str::slug('Laptop'),
            'sort_order' => 2
        ]);
        Category::create([
            'parent_id' => $elektronik->id,
            'name' => 'Aksesoris Elektronik',
            'slug' => Str::slug('Aksesoris Elektronik'),
            'sort_order' => 3
        ]);

        // 3. Create Subcategories for Furniture
        $kursi = Category::create([
            'parent_id' => $furniture->id,
            'name' => 'Kursi',
            'slug' => Str::slug('Kursi'),
            'sort_order' => 1
        ]);
        $meja = Category::create([
            'parent_id' => $furniture->id,
            'name' => 'Meja',
            'slug' => Str::slug('Meja'),
            'sort_order' => 2
        ]);
        Category::create([
            'parent_id' => $furniture->id,
            'name' => 'Lemari',
            'slug' => Str::slug('Lemari'),
            'sort_order' => 3
        ]);

        // 4. Create Subcategories for Fashion
        Category::create([
            'parent_id' => $fashion->id,
            'name' => 'Pria',
            'slug' => Str::slug('Pria'),
            'sort_order' => 1
        ]);
        Category::create([
            'parent_id' => $fashion->id,
            'name' => 'Wanita',
            'slug' => Str::slug('Wanita'),
            'sort_order' => 2
        ]);
        Category::create([
            'parent_id' => $fashion->id,
            'name' => 'Anak-anak',
            'slug' => Str::slug('Anak-anak'),
            'sort_order' => 3
        ]);

        // Create Child Subcategories (3rd level) example
        Category::create([
            'parent_id' => $smartphone->id,
            'name' => 'Android',
            'slug' => Str::slug('Android')
        ]);
        Category::create([
            'parent_id' => $smartphone->id,
            'name' => 'iOS',
            'slug' => Str::slug('iOS')
        ]);

        // 5. Create Sample Products
        Product::create([
            'category_id' => $smartphone->id,
            'sku' => 'SKU-ELEC-001',
            'name' => 'Samsung Galaxy S23 Ultra',
            'slug' => Str::slug('Samsung Galaxy S23 Ultra'),
            'description' => 'Flagship smartphone dari Samsung.',
            'price' => 20000000,
            'discount_price' => 18999000,
            'stock' => 15,
            'weight' => 250,
            'status' => true,
            'is_featured' => true
        ]);

        Product::create([
            'category_id' => $laptop->id,
            'sku' => 'SKU-ELEC-002',
            'name' => 'MacBook Pro M2',
            'slug' => Str::slug('MacBook Pro M2'),
            'description' => 'Laptop super kencang dari Apple.',
            'price' => 30000000,
            'stock' => 10,
            'weight' => 1500,
            'status' => true,
            'is_featured' => true
        ]);

        Product::create([
            'category_id' => $kursi->id,
            'sku' => 'SKU-FURN-001',
            'name' => 'Kursi Kerja Ergonomis',
            'slug' => Str::slug('Kursi Kerja Ergonomis'),
            'description' => 'Kursi kerja yang nyaman untuk dipakai seharian.',
            'price' => 1500000,
            'discount_price' => 1250000,
            'stock' => 20,
            'weight' => 8000,
            'status' => true,
            'is_featured' => false
        ]);

        Product::create([
            'category_id' => $meja->id,
            'sku' => 'SKU-FURN-002',
            'name' => 'Meja Belajar Minimalis',
            'slug' => Str::slug('Meja Belajar Minimalis'),
            'description' => 'Meja kayu bergaya Scandinavian.',
            'price' => 850000,
            'stock' => 30,
            'weight' => 15000,
            'status' => true,
            'is_featured' => true
        ]);
    }
}
