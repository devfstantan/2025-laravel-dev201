<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // créé 10 dial orders
        // bnsba l koul order:
        //   - récupérer 3 produits 3chawian man db.
        //   - rbt l'order m3a had les produits b des quantité 3chwaiin
        //   - 7sb taman total dial order ou bdlou.

        $orders = Order::factory(10)->create();
        foreach ($orders as $order) {
            // 1- récupérer 3 produits 3chawian man db.
            $products = Product::inRandomOrder()->take(3)->get();
            $price_total = 0;
            
            foreach ($products as $product) {
                $quantity = fake()->numberBetween(1, 10);
                $order->products()->attach([
                    $product->id => [
                        'quantity' => $quantity
                    ]
                ]);  
                $price_total += $product->price * $quantity;
            }
            
            $order->price_total = $price_total;
            $order->save();
        }
    }
}
