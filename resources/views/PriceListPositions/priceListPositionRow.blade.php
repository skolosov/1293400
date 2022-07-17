@foreach($priceListPositions as $priceListPosition)
    <tr>
        <td>{{ $priceListPosition->name }}</td>
        <td>{{ $priceListPosition->article }}</td>
        <td>{{ $priceListPosition->price }}</td>
        <td>
            <div>
                <a href="{{ route("position.edit", [$priceListId, $priceListPosition->id]) }}" class="btn btn-sm btn-outline-secondary">Редактировать</a>
            </div>
        </td>
        <td>
            <div>
                <form method="POST" action="{{ route("position.destroy", [$priceListId, $priceListPosition->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">X</button>
                </form>
            </div>
        </td>
    </tr>
@endforeach

