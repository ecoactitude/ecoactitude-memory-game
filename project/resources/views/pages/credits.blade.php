@extends('layouts.app')

@section('content')
    <div class="credits">
        <h2>Credits</h2>

        @foreach($credits as $credit)
            <p>
                <span><a href="{{ $credit->url }}">{{ $credit->name }}</a></span>
                <span>{{ $credit->job }}</span>
            </p>
        @endforeach
    </div>
@endsection