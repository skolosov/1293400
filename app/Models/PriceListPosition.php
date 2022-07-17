<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $price_list_id
 * @property string $name
 * @property string $article
 * @property int $price
 * @property PriceList $priceList
 * @property string $price_list_name
 */
class PriceListPosition extends Model
{
    use HasFactory;

    /** @var string[]  */
    protected $fillable = ['price_list_id', 'name', 'article', 'price'];

    /** @var bool  */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function priceList(): BelongsTo
    {
        return $this->belongsTo(PriceList::class, 'price_list_id', 'id');
    }

    /**
     * @return string
     */
    public function getPriceListNameAttribute(): string
    {
        return $this->priceList->name;
    }
}
