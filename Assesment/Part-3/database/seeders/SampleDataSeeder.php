<?php

namespace Database\Seeders;

use App\Models\{Menu, Customer, Order};
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            ['name' => 'Burger', 'price' => 8.99],
            ['name' => 'Pizza', 'price' => 12.99],
            ['name' => 'Pasta', 'price' => 10.99],
            ['name' => 'Salad', 'price' => 6.99],
        ];
        foreach ($menus as $menu) Menu::create($menu);

        $customers = [
            ['name' => 'John Doe', 'phone' => '555-0101'],
            ['name' => 'Jane Smith', 'phone' => '555-0102'],
        ];
        foreach ($customers as $customer) Customer::create($customer);

        Order::create(['customer_id' => 1, 'menu_id' => 1, 'quantity' => 2, 'status' => 'delivered']);
        Order::create(['customer_id' => 2, 'menu_id' => 2, 'quantity' => 1, 'status' => 'pending']);
    }
}
