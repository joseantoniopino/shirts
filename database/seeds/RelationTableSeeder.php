<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->saveValues(1,1);
        $this->saveValues(1,2);
        $this->saveValues(1,3);
        $this->saveValues(2,1);
        $this->saveValues(2,3);
        $this->saveValues(3,3);
        $this->saveValues(4,1);
        $this->saveValues(5,1);
        $this->saveValues(5,2);
        $this->saveValues(5,3);
        $this->saveValues(6,2);
    }

    private function saveValues($p, $v)
    {
        DB::table('product_variant')->insert([
            'product_id' => $p,
            'variant_id' => $v,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
