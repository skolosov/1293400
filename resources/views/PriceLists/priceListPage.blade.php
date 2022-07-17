@extends('layouts.document')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                @include('PriceLists.priceListTable')
            </div>
            <div class="col-4">
                <div class="list-group w-auto">
                    <div class="list-group-item d-flex gap-3 py-3">
                        <a class="btn btn-success" href="{{ route('price-lists.create') }}">
                            Создать прайс-лист
                        </a>
                    </div>
                    <div class="list-group-item d-flex gap-3 py-3">
                        <div class="container p-4">
                            <form method="GET" action="{{ route("price-lists.index") }}">
                                @method('GET')
                                @csrf
                                <div class="mb-3">
                                    <label for="durationPriceList" class="form-label">Фильтр по сроку действия прайс
                                        листа</label>
                                    <input type="date" class="form-control" id="durationPriceList" name="duration"
                                           value="{{ $duration }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Фильтр</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
