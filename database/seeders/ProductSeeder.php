<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'STOP Forte Leke Çıkarıcı',
            'description' => 'Bu üründen en fazla 20 adet sipariş verilebilir. Belirlenen bu limit kurumsal siparişlerde geçerli olmayıp, kurumsal siparişler için farklı limitler belirlenebilmektedir.',
            'price' => 145.00,
            'stock' => 100,
            'imageurl' => 'https://cdn.dsmcdn.com/ty1129/product/media/images/prod/SPM/PIM/20240111/08/e7ce2ca8-5665-3f39-aea4-d601457fd3e2/1_org_zoom.jpg',
        ]);

        Product::create([
            'name' => 'One Step Saç Şekillendirici ve Saç Düzleştirici Fön Tarağı',
            'description' => 'Bu üründen en fazla 5 adet sipariş verilebilir. Belirlenen bu limit kurumsal siparişlerde geçerli olmayıp, kurumsal siparişler için farklı limitler belirlenebilmektedir.',
            'price' => 316.15,
            'stock' => 50,
            'imageurl' => 'https://cdn.dsmcdn.com/ty727/product/media/images/20230211/19/279529451/141077946/1/1_org_zoom.jpg',
        ]);

        Product::create([
            'name' => 'Matcha Premium Japanese MATCHA & BROMELAİN Limon Aromalı Detox Burner Form Çayı 1 Kutu',
            'description' => 'Bu üründen en fazla 20 adet sipariş verilebilir. Belirlenen bu limit kurumsal siparişlerde geçerli olmayıp, kurumsal siparişler için farklı limitler belirlenebilmektedir.',
            'price' => 222.68,
            'stock' => 200,
            'imageurl' => 'https://cdn.dsmcdn.com/ty1326/product/media/images/prod/QC/20240525/02/c9ca404a-58a5-394b-8635-a40a76360901/1_org_zoom.jpg',
        ]);
    }
}
