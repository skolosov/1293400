<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\PriceList;
use App\Services\PriceListService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * @var PriceListService $priceListService
     */
    protected PriceListService $priceListService;

    /**
     * @param PriceListService $priceListService
     */
    public function __construct(PriceListService $priceListService)
    {
        $this->priceListService = $priceListService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        [$priceLists, $duration] = $this->priceListService
            ->getPriceLists($request->get('duration'));
        return view('PriceLists.priceListPage',
            ['priceLists' => $priceLists, 'duration' => $duration ?? null]
        );
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $data = [
            'providers' => $this->priceListService->getProviders(),
            'currencies' => $this->priceListService->getCurrencies(),
        ];
        return view('PriceLists.createForm', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->priceListService->storePriceList($request->all());
        LogActivity::addToLog('create');
        return redirect()->route('home');
    }

    public function show(int $id)
    {
        /** @var PriceList $priceList */
        $priceList = $this->priceListService->showPriceList($id);
        $data = [
            'priceList' => $priceList,
            'priceListPositions' => $priceList->priceListPositions,
            'priceListId' => $priceList->id
        ];
        return view('PriceLists.priceListShow', $data);
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $data = [
            'priceList' => $this->priceListService->showPriceList($id),
            'providers' => $this->priceListService->getProviders(),
            'currencies' => $this->priceListService->getCurrencies(),
        ];
        return view('PriceLists.updateForm', $data);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->priceListService->updatePriceList($request->all(), $id);
        LogActivity::addToLog('update');
        return redirect()->route('home');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->priceListService->destroyPriceList($id);
        LogActivity::addToLog('delete');
        return redirect()->route('home');
    }
}
