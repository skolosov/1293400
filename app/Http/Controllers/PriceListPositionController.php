<?php

namespace App\Http\Controllers;

use App\Exports\PriceListExport;
use App\Helpers\LogActivity;
use App\Models\PriceList;
use App\Services\PriceListPositionService;
use App\Services\PriceListService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        LogActivity::addToLog('create');
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
        LogActivity::addToLog('update');
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
        LogActivity::addToLog('delete');
        return redirect()->route('price-lists.show', $priceListId);
    }

    /**
     * @param int $priceListId
     * @return BinaryFileResponse
     */
    public function export(int $priceListId): BinaryFileResponse
    {
        /** @var PriceList $priceList */
        $priceList = $this->priceListService->showPriceList($priceListId);
        $data = [
            'priceList' => $priceList,
            'priceListPositions' => $priceList->priceListPositions
        ];

        return Excel::download(new PriceListExport($data), 'users.xlsx');
    }
}
