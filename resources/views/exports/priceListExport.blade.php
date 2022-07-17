<!DOCTYPE html>
<html lang="{{ \Lang::getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>MEGA</title>
</head>
<body>
<table>
    <tbody>
    <tr>
        <td>Название прайс листа</td>
        <td>{{ $priceList->name }}</td>
    </tr>
    <tr>
        <td>Срок действия</td>
        <td colspan="2">{{ $priceList->duration }}</td>
    </tr>
    <tr>
        <td>Поставщик</td>
        <td colspan="2">{{ $priceList->provider_name }}</td>
    </tr>
    <tr>
        <td>Валюта</td>
        <td colspan="2">{{ $priceList->currency_name }}</td>
    </tr>
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <td>Название позиции</td>
            <td>Артикул</td>
            <td>Стоимость</td>
        </tr>
    </thead>
    <tbody>
    @foreach($priceListPositions as $priceListPosition)
        <tr>
            <td>{{ $priceListPosition->name }}</td>
            <td>{{ $priceListPosition->article }}</td>
            <td>{{ $priceListPosition->price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
