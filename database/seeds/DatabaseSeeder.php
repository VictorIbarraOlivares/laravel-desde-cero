<?php

use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 20)
            ->create()
            ->each(function($user){
                $image = factory(App\Image::class)->states('user')->make();
                
                $user->image()->save($image);
            });

        $orders = factory(App\Order::class, 10)
            ->make()
            ->each(function($order) use ($users) {
                $order->customer_id = $users->random()->id;
                $order->save();

                $payment = factory(App\Payment::class)->make();
            
                $order->payment()->save($payment);
            });

        $carts = factory(App\Cart::class,20)->create();

        $products = factory(App\Product::class, 50)
            ->create()
            ->each(function($product) use ($orders, $carts){
                $order = $orders->random();

                $order->products()->attach([
                    $product->id => ['quantity' => mt_rand(1, 3)]
                ]);

                $cart = $carts->random();

                $cart->products()->attach([
                    $product->id => ['quantity' => mt_rand(1, 3)]
                ]);

                $images = factory(App\Image::class, mt_rand(2, 4))->make();
                $product->images()->saveMany($images);
            });
    }
}
