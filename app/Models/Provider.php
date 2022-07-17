<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 */
class Provider extends Model
{
    use HasFactory;

    /** @var string[]  */
    protected $fillable = ['name'];

    /** @var bool  */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function priceLists(): HasMany
    {
        return $this->hasMany(PriceList::class, 'provider_id', 'id');
    }
}
