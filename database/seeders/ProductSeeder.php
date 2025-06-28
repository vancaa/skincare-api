<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Aloe Soothing Gel 99%',
                'brand' => 'Nature Republic',
                'price' => 45000,
                'category' => 'Gel',
                'image_url' => 'assets/images/products/aloe-soothing-gel-99percent.png',
            ],
            [
                'name' => 'Avoskin Miraculous Refining Toner',
                'brand' => 'Avoskin',
                'price' => 135000,
                'category' => 'Toner',
                'image_url' => 'assets/images/products/avoskin-miraculous-refining-toner.png',
            ],
            [
                'name' => 'Azarine Hydrasoothe Sunscreen Gel',
                'brand' => 'Azarine',
                'price' => 65000,
                'category' => 'Sunscreen',
                'image_url' => 'assets/images/products/azarine-hydrasoothe-sunscreen-gel.png',
            ],
            [
                'name' => 'Bright Serum',
                'brand' => 'Nutrishe',
                'price' => 85000,
                'category' => 'Serum',
                'image_url' => 'assets/images/products/bright-serum.png',
            ],
            [
                'name' => 'Cleansing Gel',
                'brand' => 'Scarlett',
                'price' => 55000,
                'category' => 'Cleanser',
                'image_url' => 'assets/images/products/cleansing-gel.png',
            ],
            [
                'name' => 'COSRX Low pH Good Morning Gel Cleanser',
                'brand' => 'COSRX',
                'price' => 95000,
                'category' => 'Cleanser',
                'image_url' => 'assets/images/products/cosrx-low-ph-good-morning-gel-cleanser.png',
            ],
            [
                'name' => 'ElshéSkin Deep Cleansing Sensitive',
                'brand' => 'ElshéSkin',
                'price' => 90000,
                'category' => 'Cleanser',
                'image_url' => 'assets/images/products/elsheskin-deep-cleansing-sensitive.png',
            ],
            [
                'name' => 'Exfoliating Toner',
                'brand' => 'Somethinc',
                'price' => 78000,
                'category' => 'Toner',
                'image_url' => 'assets/images/products/exfoliating-toner.png',
            ],
            [
                'name' => 'Hada Labo Gokujyun Ultimate Moisturizing Lotion',
                'brand' => 'Hada Labo',
                'price' => 120000,
                'category' => 'Lotion',
                'image_url' => 'assets/images/products/hada-labo-gokujyun-ultimate-moisturizing-lotion.png',
            ],
            [
                'name' => 'L’Oréal Revitalift Crystal Micro-Essence',
                'brand' => 'L’Oreal',
                'price' => 170000,
                'category' => 'Essence',
                'image_url' => 'assets/images/products/loreal-revitalift-crystal-micro-essence.png',
            ],
            [
                'name' => 'Night Cream Repair',
                'brand' => 'Avoskin',
                'price' => 99000,
                'category' => 'Cream',
                'image_url' => 'assets/images/products/night-cream-repair.png',
            ],
            [
                'name' => 'Skintific 5X Ceramide Barrier Moisturizer',
                'brand' => 'Skintific',
                'price' => 149000,
                'category' => 'Moisturizer',
                'image_url' => 'assets/images/products/skintific-5x-ceramide-barrier-moisturizer.png',
            ],
            [
                'name' => 'Some By Mi AHA BHA PHA 30 Days Miracle Toner',
                'brand' => 'Some By Mi',
                'price' => 125000,
                'category' => 'Toner',
                'image_url' => 'assets/images/products/some-by-mi-aha-bha-pha-30-days-miracle-toner.png',
            ],
            [
                'name' => 'Somethinc Level 1% Retinol',
                'brand' => 'Somethinc',
                'price' => 150000,
                'category' => 'Serum',
                'image_url' => 'assets/images/products/somethinc-level-1percent-retinol.png',
            ],
            [
                'name' => 'Sunscreen 50',
                'brand' => 'Nivea',
                'price' => 60000,
                'category' => 'Sunscreen',
                'image_url' => 'assets/images/products/sunscreen-50.png',
            ],
            [
                'name' => 'The Ordinary Niacinamide 10% + Zinc 1%',
                'brand' => 'The Ordinary',
                'price' => 130000,
                'category' => 'Serum',
                'image_url' => 'assets/images/products/the-ordinary-niacinamide-10percent--zinc-1percent.png',
            ],
            [
                'name' => 'Toner Glow',
                'brand' => 'Skintific',
                'price' => 75000,
                'category' => 'Toner',
                'image_url' => 'assets/images/products/toner-glow.png',
            ],
            [
                'name' => 'Toner Lightening',
                'brand' => 'Wardah',
                'price' => 60000,
                'category' => 'Toner',
                'image_url' => 'assets/images/products/toner-lightening.png',
            ],
            [
                'name' => 'Vitamin C Serum',
                'brand' => 'The Ordinary',
                'price' => 125000,
                'category' => 'Serum',
                'image_url' => 'assets/images/products/vitamin-c-serum.png',
            ],
            [
                'name' => 'Wardah UV Shield Aqua Fresh Essence',
                'brand' => 'Wardah',
                'price' => 57000,
                'category' => 'Essence',
                'image_url' => 'assets/images/products/wardah-uv-shield-aqua-fresh-essence.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create(array_merge([
                'stock' => 20,
                'description' => 'Produk skincare unggulan untuk perawatan harian kulit.',
            ], $product));
        }
    }
}
