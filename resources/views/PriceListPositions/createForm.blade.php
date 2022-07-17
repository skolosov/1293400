@extends('layouts.document')
@section('content')
    @include('layouts.backTop', ['url' => route("price-lists.show", $priceListId)])
    <div class="container p-4">
        <form method="POST" action="{{ route('position.store', $priceListId) }}">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="namePriceListPosition" class="form-label">Название</label>
                <input type="text" class="form-control" id="namePriceListPosition" name="name" required>
                <div class="form-text">Введите название позиции прайс листа.</div>
            </div>
            <div class="mb-3">
                <label for="articlePriceListPosition" class="form-label">Артикул</label>
                <input type="text" class="form-control" id="articlePriceListPosition" name="article" required>
                <div class="form-text">Введите артикул позиции прайс листа.</div>
            </div>
            <div class="mb-3">
                <label for="pricePriceListPosition" class="form-label">Стоимость</label>
                <input type="text" class="form-control" id="pricePriceListPosition" name="price" required>
                <div class="form-text">Введите стоимость позиции прайс листа.</div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
