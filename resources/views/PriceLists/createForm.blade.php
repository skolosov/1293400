@extends('layouts.document')
@section('content')
    @include('layouts.backTop')
    <div class="container p-4">
        <form method="POST" action="{{ url("price-lists") }}">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="namePriceList" class="form-label">Название</label>
                <input type="text" class="form-control" id="namePriceList" name="name" required>
                <div class="form-text">Введите название прайс листа.</div>
            </div>
            <div class="row mb-3">
                <div class="col-8">
                    <label for="providersId" class="form-label">Поставщик</label>
                    <select class="form-select" name="provider_id" id="providersId" required>
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}">
                                {{ $provider->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="currencyId" class="form-label">Валюта</label>
                    <select class="form-select" name="currency_id" id="currencyId" required>
                        @foreach($currencies as $currency)
                            <option value="{{ $currency->id }}">
                                {{ $currency->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="durationPriceList" class="form-label">Срок действия прайс листа</label>
                    <input type="date" class="form-control" id="durationPriceList" name="duration" required>
                    <div class="form-text">Выберете дату до которой будет дествовать прайс лист</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
