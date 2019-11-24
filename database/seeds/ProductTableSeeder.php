<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i <= 5; $i++){
            $p = new Product();
            $p->name = 'Camiseta ' . $i;
            $p->save();
        }
    }
}
