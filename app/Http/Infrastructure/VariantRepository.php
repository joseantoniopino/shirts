<?php


namespace App\Http\Infrastructure;


use App\Variant;
use Illuminate\Support\Facades\DB;
use stdClass;

class VariantRepository extends Variant
{

    /**
     * @return float
     */
    public function findCheaperVariant(): float
    {
        $prices = DB::table($this->table)->select('price', 'optional_price')->get();

        $cheapPrice = 0;
        foreach ($prices as $price){
            if (!is_null($price->optional_price)){
                $thisPrice = $price->optional_price;
            } else {
                $thisPrice = $price->price;
            }

            if (0 == $cheapPrice){
                $cheapPrice = $thisPrice;
            }

            if ($thisPrice < $cheapPrice){
                $cheapPrice = $thisPrice;
            }

            unset($thisPrice);
        }
        return $cheapPrice;
    }

    /**
     * @return stdClass
     */
    public function getAveragePrice()
    {
        $avg = new stdClass();
        $avg->price = DB::table($this->table)->avg('price');
        $avg->optional_price = DB::table($this->table)->avg('optional_price');

        return $avg;
    }
}
