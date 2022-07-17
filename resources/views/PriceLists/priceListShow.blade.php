@extends('layouts.document')
@section('content')
    @include('layouts.backTop')
    <div class="container">
        <div class="row">
            <div class="mt-4">
                <div class="list-group w-auto">
                    <div class="list-group-item d-flex gap-3 py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="container">
                                        <div class="row">
                                            <span><strong>Название: </strong> {{ $priceList->name }}</span>
                                        </div>
                                        <div class="row">
                                            <span><strong>Срок действия: </strong> {{ $priceList->duration }}</span>
                                        </div>
                                        <div class="row">
                                            <span><strong>Поставщик: </strong> {{ $priceList->provider_name }}</span>
                                        </div>
                                        <div class="row">
                                            <span><strong>Валюта: </strong> {{ $priceList->currency_name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col d-flex flex-column flex-grow-0 noWrap align-content-end justify-content-start">
                                    <div class="mb-3">
                                        <a href="{{ route('position.create', $priceList->id) }}"
                                           class="btn btn-sm btn-success">
                                            <span>
                                                Создать позицию
                                            </span>
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ route('price-lists.export', $priceList->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <span>
                                                Сохранить в Excel
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item d-flex gap-3 py-3">
                        <div class="container p-4">
                            @include('PriceListPositions.priceListPositionsTable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
