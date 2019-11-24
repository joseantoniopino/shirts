<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Variant
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property float|null $optional_price
 * @property string $size
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @method static Builder|Variant newModelQuery()
 * @method static Builder|Variant newQuery()
 * @method static Builder|Variant query()
 * @method static Builder|Variant whereCreatedAt($value)
 * @method static Builder|Variant whereId($value)
 * @method static Builder|Variant whereName($value)
 * @method static Builder|Variant whereOptionalPrice($value)
 * @method static Builder|Variant wherePrice($value)
 * @method static Builder|Variant whereSize($value)
 * @method static Builder|Variant whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Variant extends Model
{
    protected $table = 'variants';
    protected $fillable = [
        'name', 'price', 'optional_price', 'size'
    ];

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
