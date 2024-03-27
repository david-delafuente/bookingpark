<header>
    <link rel="stylesheet" href="{{ asset('css/partials/message.style.css') }}">
</header>

@if ($message = Session::get('success'))
    <div class="flash-message success-message">
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('danger'))
    <div class="flash-message danger-message">
        {{ $message }}
    </div>
@endif
