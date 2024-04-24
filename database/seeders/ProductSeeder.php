<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = [];

        foreach (range(1, 10) as $index){
            $product = [
                'title' => 'Elektrische gitaar',
                'category' => 'Hobby',
                'description' => 'Deze zwarte Squier elektrische gitaar is een uitstekende keuze voor zowel beginners als gevorderde gitaristen. Met zijn strakke zwarte afwerking en klassieke ontwerp is deze gitaar niet alleen stijlvol, maar ook veelzijdig en betrouwbaar.',
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $products[] = $product;
        }
        DB::table('products')->delete();
        DB::table('products')->insert($products);
    }
}

