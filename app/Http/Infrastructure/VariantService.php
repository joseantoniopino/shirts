<?php


namespace App\Http\Infrastructure;


use App\Exceptions\ObjectNotFoundException;
use App\Variant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class VariantService
{

    /**
     * @param $id
     * @throws ObjectNotFoundException
     */
    public static function checkIfVariantExist($id): void
    {
        $variant = Variant::find($id);

        if (!$variant)
            throw new ObjectNotFoundException('Variant');
    }

    /**
     * @return Builder|Model|object|null
     */
    public static function getCheapVariant()
    {
        $cheapPrice = (new VariantRepository())->findCheaperVariant();
        $cheapVariant = Variant::where('price', $cheapPrice)->orWhere('optional_price', $cheapPrice)->first();
        return $cheapVariant;
    }

    /**
     * @return stdClass
     */
    public static function avgPrices()
    {
        return (new VariantRepository())->getAveragePrice();
    }


}
