<?php

use App\Variant;
use Illuminate\Database\Seeder;

class VariantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->saveValues('Small', 10, null, 's');
        $this->saveValues('Medium', 15, 12.50, 'm');
        $this->saveValues('Large', 20, null, 'l');
    }

    private function saveValues($name, $price, $optionalPrice, $size)
    {
        $v = new Variant();
        $v->name = $name;
        $v->price = $price;
        $v->optional_price = $optionalPrice;
        $v->size = $size;
        $v->save();
    }
}
