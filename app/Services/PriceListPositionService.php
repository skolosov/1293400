<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\PriceList;
use App\Models\PriceListPosition;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PriceListPositionService
{
    /**
     * @param array $body
     * @param int $priceListId
     * @return array
     */
    private function getFieldsArrFromBody(array $body, int $priceListId): array
    {
        return [
            'name' => $body['name'],
            'article' => $body['article'],
            'price' => (int)$body['price'],
            'price_list_id' => $priceListId
        ];
    }

    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function showPriceListPosition(int $id)
    {
        return PriceListPosition::query()->findOrFail($id);
    }

    /**
     * @param array $body
     * @param int $priceListId
     * @return void
     */
    public function storePriceListPosition(array $body, int $priceListId): void
    {
        $aa = $this->getFieldsArrFromBody($body, $priceListId);
        PriceListPosition::query()->create($aa);
    }

    /**
     * @param array $body
     * @param int $id
     * @param int $priceListId
     * @return void
     */
    public function updatePriceListPosition(array $body, int $id, int $priceListId): void
    {
        PriceListPosition::query()->where('id', $id)
            ->update($this->getFieldsArrFromBody($body, $priceListId));
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroyPriceListPosition(int $id): void
    {
        PriceListPosition::destroy($id);

    }
}
