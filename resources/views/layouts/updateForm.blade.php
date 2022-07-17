@extends('layouts.document')
@section('content')
    @include('layouts.backTop')
    <div class="container p-4">
        <form method="POST" action="{{ url("price-lists/$priceList->id") }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="namePriceList" class="form-label">Название</label>
                <input type="text" class="form-control" id="namePriceList" name="name" value="{{ $priceList->name }}">
                <div class="form-text">Введите название прайс листа.</div>
            </div>
            <div class="row mb-3">
                <div class="col-8">
                    <label for="providerId" class="form-label">Поставщик</label>
                    <select class="form-select" name="provider_id" id="providerId">
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}"
                                {{ $priceList->provider->id === $provider->id ? 'selected' : '' }}
                            >{{ $provider->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="currencyId" class="form-label">Валюта</label>
                    <select class="form-select" name="currency_id" id="currencyId">
                        @foreach($currencies as $currency)
                            <option value="{{ $currency->id }}"
                                {{ $priceList->currency->id === $currency->id ? 'selected' : '' }}
                            >{{ $currency->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="durationPriceList" class="form-label">Срок действия прайс листа</label>
                    <input type="date" class="form-control" id="durationPriceList" name="duration"
                           value="{{ $priceList->duration }}">
                    <div class="form-text">Выберете дату до которой будет дествовать прайс лист</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
