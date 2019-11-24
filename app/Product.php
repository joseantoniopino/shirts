<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Product
 *
 * @property-read Collection|Variant[] $variants
 * @property-read int|null $variants_count
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @mixin Eloquent
 */
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name'
    ];

    /**
     * @return BelongsToMany
     */
    public function variants()
    {
        return $this->belongsToMany(Variant::class)->withTimestamps();
    }
}
