<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\PriceList;
use App\Services\PriceListPositionService;
use App\Services\PriceListService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PriceListPositionController extends Controller
{
    /**
     * @var PriceListPositionService $priceListPositionService
     * @var PriceListService $priceListService
     */
    protected PriceListPositionService $priceListPositionService;
    protected PriceListService $priceListService;

    /**
     * @param PriceListPositionService $priceListPositionService
     * @param PriceListService $priceListService
     */
    public function __construct(
        PriceListPositionService $priceListPositionService,
        PriceListService $priceListService
    ) {
        $this->priceListPositionService = $priceListPositionService;
        $this->priceListService = $priceListService;
    }

    /**
     * @return Application|Factory|View
     */
    public function create(int $priceListId)
    {
        return view('PriceListPositions.createForm', ['priceListId' => $priceListId]);
    }

    /**
     * @param Request $request
     * @param int $priceListId
     * @return RedirectResponse
     */
    public function store(Request $request, int $priceListId): RedirectResponse
    {
        $this->priceListPositionService->storePriceListPosition($request->all(), $priceListId);
        return redirect()->route('price-lists.show', $priceListId);
    }

    /**
     * @param int $priceListId
     * @param int $priceListPositionId
     * @return Application|Factory|View
     */
    public function edit(int $priceListId, int $priceListPositionId)
    {
        $data = [
            'priceListPosition' => $this->priceListPositionService->showPriceListPosition($priceListPositionId),
            'priceListId' => $priceListId,
        ];
        return view('PriceListPositions.updateForm', $data);
    }

    /**
     * @param Request $request
     * @param int $priceListId
     * @param int $priceListPositionId
     * @return RedirectResponse
     */
    public function update(Request $request, int $priceListId, int $priceListPositionId): RedirectResponse
    {
        $this->priceListPositionService
            ->updatePriceListPosition($request->all(), $priceListPositionId, $priceListId);
        return redirect()->route('price-lists.show', $priceListId);
    }

    /**
     * @param int $priceListId
     * @param int $priceListPositionId
     * @return RedirectResponse
     */
    public function destroy(int $priceListId, int $priceListPositionId): RedirectResponse
    {
        $this->priceListPositionService->destroyPriceListPosition($priceListPositionId);
        return redirect()->route('price-lists.show', $priceListId);
    }
}
