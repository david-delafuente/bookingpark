@extends('layouts.layout')
@section('title', 'Ficha de parking')

@section('content')
    <a onclick="window.history.back()" class="btn_user_profile">
        <ion-icon size="large" name="arrow-back-outline"></ion-icon>
    </a>
    <div class="parking_sheet_container">
        <div class="general">
            <h5>Parking {{ $parking->name }}</h5>
            <div class="parking_card parking_card_row1">

                <div class="parking_card_block1">
                    <p><strong>Dirección: </strong></p>
                    <p><strong>Contacto: </strong></p>
                    <p><strong>Horario: </strong></p>
                    <p><strong>Plaza pequeña: </strong></p>
                    <p><strong>Plaza grande: </strong></p>
                </div>
                <div class="parking_card_block2">
                    <p>{{ $parking->adress }}</p>
                    <p>{{ $parking->contact_info }}</p>
                    <p>{{ $parking->operating_info }}</p>
                    <p>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="size" id="small"
                                value="checkedValue">
                            {{ $num_plazas_small }} disponibles
                        </label>
                    </div>
                    </p>
                    <p>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="size" id="large"
                                value="checkedValue">
                            {{ $num_plazas_large }} disponibles
                        </label>
                    </div>
                    </p>
                </div>
            </div>
            <h5>Elige la fecha de tu rreserva</h5>
            <div class="parking_card parking_card_row2">
                <input class="form-control mb-3" type="text" id="datePicker" name="fecha1" placeholder="Entrada">
                <input class="form-control mb-3" type="text" id="datePicker" name="fecha2" placeholder="Salida">
            </div>
            <div class="parking_card parking_card_row3">

                @if (Auth::user() && Auth::user()->membership_id == 1)

                    <div class="block1">
                        @if ($last_mile_type == 'patinete')
                            <img src="{{ asset('images/parking_sheet/patinete.png') }}" alt="patinete">
                        @elseif ($last_mile_type == 'bicicleta')
                            <img src="{{ asset('images/parking_sheet/bicicleta.png') }}" alt="bicicleta">
                        @endif
                    </div>
                    <div class="block2">
                        <h5>Este establecimiento dispone de vehículos para el LAST MILE</h5>
                        <p>Hazte socio y accederás a ellos de forma gratuita!
                            </strong></p>
                        <a href="{{ route('joinus') }}" class="btn btn-outline-primary btn-block">Hazte socio</a>
                        <button class="btn btn-outline-success btn-block">Reservar ya</button>
                    </div>
                @else
                    @if ($last_mile_availables > 1)

                        @if ($last_mile_type == 'patinete')
                            <img src="{{ asset('images/parking_sheet/patinete.png') }}" alt="patinete">
                        @elseif ($last_mile_type == 'bicicleta')
                            <img src="{{ asset('images/parking_sheet/bicicleta.png') }}" alt="bicicleta">
                        @endif
                        <p><strong>Disponibles: </strong>{{ $last_mile_availables }} {{ $last_mile_type }}s</p>
                    @else
                    @endif
                    <div class="parking_card booking_card text-center">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="last_mile" id="last_mile"
                                    value="checkedValue">
                                Añadir LAST MILE!
                            </label>
                        </div>
                        <button class="btn btn-outline-success btn-block">Reservar ya</button>
                    </div>
                @endif
            </div>
        </div>

    </div>

@endsection
@section('script_page')
    <script>
        // Obtener la hora actual
        const now = new Date();
        const currentHour = now.getHours();

        flatpickr("#datePicker", {
            minDate: "today",
            minuteIncrement: "30",
            dateFormat: "Y-m-d",
            defaultHour: currentHour,
            enableTime: true,
            time_24hr: true
        });
    </script>
@endsection
