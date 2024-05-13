@extends('layouts.app')

@section('content')
    <div class="high-scores">
        <h2>Meilleurs Scores</h2>

        @foreach($scores as $score)
            <p>
                <span class="bold">{{ $score->name }}</span>
                <span>: {{ $score->score }} points</span>
            </p>
        @endforeach
    </div>
@endsection