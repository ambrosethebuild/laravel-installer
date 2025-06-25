<div class="flex justify-end items-center">
<!-- incase of slot -->
 @if(isset($slot))
    {{ $slot }}
 @endif

    @php
        $disabled = isset($disabled) && $disabled;
    @endphp
    @if($disabled)
        <button type="submit" class="btn-primary" disabled>
            {{ $title ?? 'Continue' }}
        </button>
    @else
        <button type="submit" class="btn-primary">
            {{ $title ?? 'Continue' }}
        </button>
    @endif
</div>