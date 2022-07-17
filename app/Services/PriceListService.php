<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\PriceList;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PriceListService
{
    /**
     * @param array $body
     * @return array
     */
    private function getFieldsArrFromBody(array $body): array
    {
        return [
            'name' => $body['name'],
            'provider_id' => (int)$body['provider_id'],
            'currency_id' => (int)$body['currency_id'],
            'duration' => $body['duration'],
        ];
    }

    /**
     * @param string|null $duration
     * @return array
     */
    public function getPriceLists(?string $duration = null): array
    {
        $priceListBuilder = PriceList::query()->with(['provider', 'currency']);
        $duration && $priceListBuilder->where('duration', '>=', $duration);
        return [$priceListBuilder->get(), $duration];
    }

    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function showPriceList(int $id)
    {
        return PriceList::query()->with(['provider', 'currency'])->findOrFail($id);
    }

    /**
     * @return Provider[]|Collection
     */
    public function getProviders(): Collection
    {
        return Provider::all();
    }

    /**
     * @return Currency[]|Collection
     */
    public function getCurrencies(): Collection
    {
        return Currency::all();
    }

    /**
     * @param array $body
     * @return void
     */
    public function storePriceList(array $body): void
    {
        $aa = $this->getFieldsArrFromBody($body);
        PriceList::query()->create($aa);
    }

    /**
     * @param array $body
     * @param int $id
     * @return void
     */
    public function updatePriceList(array $body, int $id): void
    {
        PriceList::query()->where('id', $id)
            ->update($this->getFieldsArrFromBody($body));
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroyPriceList(int $id): void
    {
        PriceList::destroy($id);

    }
}
