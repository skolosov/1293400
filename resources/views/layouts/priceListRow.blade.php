@foreach($priceLists as $priceList)
    <tr>
        <td>{{ $priceList->name }}</td>
        <td>{{ $priceList->provider_name }}</td>
        <td>{{ $priceList->duration }}</td>
        <td>{{ $priceList->currency_name }}</td>
        <td>
            <div>
                <div class="btn-group">
                    <a href="{{ route("price-lists.edit", $priceList->id) }}" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                    <a href="{{ route("price-lists.show", $priceList->id) }}" class="btn btn-sm btn-outline-secondary">Открыть</a>
                </div>
            </div>
        </td>
        <td>
            <div>
                <form method="POST" action="{{ url("price-lists/$priceList->id") }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">X</button>
                </form>
            </div>
        </td>
    </tr>
@endforeach

