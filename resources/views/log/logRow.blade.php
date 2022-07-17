@foreach($logs as $log)
    <tr>
        <td>{{ $log->id }}</td>
        <td>{{ $log->subject }}</td>
        <td>{{ $log->url }}</td>
        <td>{{ $log->method }}</td>
        <td>{{ $log->ip }}</td>
        <td>{{ $log->agent }}</td>
        <td>{{ $log->user_id }}</td>
        <td>{{ $log->created_at }}</td>
    </tr>
@endforeach

