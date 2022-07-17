@extends('layouts.document')
@section('content')
    @include('layouts.backTop')
    <div class="container-fluid mt-4">
        @include('log.logTable')
    </div>
@endsection
