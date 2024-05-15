<div
    @if(!$isFlipped) onclick="flipCard(this, '{{ $id }}')"@endif
    @if($isInError) wire:init="startTimer"@endif
    class="card @if($isInError)error-card @endif @if(!$isFlipped)card-back @endif"
>
    <div class="error-status"></div>
    @if($src)
        <img src="{{ $src }}" alt="{{ $alt }}">
    @else
        <div class="img-placeholder"></div>
    @endif
</div>


@if($isInError)
    @script
        <script>
            $wire.on('start-timer', () => {
                setTimeout(() => {
                    $wire.dispatch('reset-card', { id: String({{ $id }}) })
                }, 300)
            })
        </script>
    @endscript
@endif
