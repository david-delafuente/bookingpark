<div class="card_container">
    @foreach ($parkings as $parking)
        <form class="parking_card" action="{{ route('show_parking_data') }}" method="post">
            @csrf
            <div>
                <input type="hidden" name="parking_id" value="{{ $parking->id }}">
                <p><strong>Local: </strong> {{ $parking->name }}</p>
                <p><strong>Dirección: </strong>{{ $parking->adress }}</p>
                <p><strong>Contacto: </strong>{{ $parking->contact_info }}</p>
                <p><strong>Horario: </strong>{{ $parking->operating_info }}</p>
                <button class="btn btn-outline-success" type="submit">Reservar</button>
            </div>
        </form>
    @endforeach
</div>
