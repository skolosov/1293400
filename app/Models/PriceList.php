<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Collection\Collection;

/**
 * @property int $id
 * @property string $name
 * @property int $provider_id
 * @property string $duration
 * @property int currency_id
 * @property string $currency_name
 * @property string $provider_name
 * @property Currency $currency
 * @property Provider $provider
 * @property Collection $priceListPositions
 */
class PriceList extends Model
{
    use HasFactory;

    /** @var string[]  */
    protected $fillable = [
        'name',
        'provider_id',
        'duration',
        'currency_id',
    ];

    /** @var bool  */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    /**
     * @return string
     */
    public function getCurrencyNameAttribute(): string
    {
        return $this->currency->name;
    }


    /**
     * @return BelongsTo
     */
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }

    /**
     * @return hasMany
     */
    public function priceListPositions(): hasMany
    {
        return $this->hasMany(PriceListPosition::class, 'price_list_id', 'id');
    }

    /**
     * @return string
     */
    public function getProviderNameAttribute(): string
    {
        return $this->provider->name;
    }
}
