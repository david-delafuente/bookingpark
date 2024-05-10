@extends('layouts.layout')
@section('title', 'Perfil de usuario')

@section('content')
    <!-- Main content -->
    <a href="{{ route('welcome') }}" class="btn_user_profile">
        <ion-icon size="large" name="arrow-back-outline"></ion-icon>
    </a>
    <div class="user_profile_container">
        @include('layouts.partials.message')

        <div class="col-md-6 user_block">
            <div class="user_card">
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Tipo de membresía:</strong>
                        @if (auth()->user()->membership_id == 1)
                            Básica
                            <a href="{{ route('joinus') }}" class="btn btn-outline-success">
                                Hazte socio
                            </a>
                        @elseif(auth()->user()->membership_id == 2)
                            Premium
                            <a href="{{ route('membership_cancel') }}" class="btn btn-outline-danger">
                                Cancelar membresía
                            </a>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="user_list">

            <div class="col-md-6 user_bookings">
                <div>
                    <h2 class="user_title">Mis reservas</h2>
                    @foreach ($user->bookings as $booking)
                        <div class="booking_list">
                            <div>
                                <span class="card-title"><strong>Parking: </strong>
                                    {{ $booking->park_place->parking->name }}
                                </span>

                                <span><strong>Entrada:</strong>
                                    {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m') }}</span>

                            </div>
                            <div>
                                <span><strong>Dirección:</strong> {{ $booking->park_place->parking->adress }}</span>
                            </div>

                            <!-- If the booking has associated LastMile -->
                            @if ($booking->bookingLastMile()->exists())
                                <div>
                                    <p>¡Tienes un Last Mile asociado!</>
                                </div>
                            @endif
                            <div>
                                <a href="{{ route('cancel_booking', ['booking_id' => $booking->id]) }}"
                                    class="btn btn-outline-danger">Cancelar</a>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-3 user_autos">
                <div>
                    <h2 class="user_title">Mis vehículos</h2>

                    <div class="d-grid gap-2 user_title">
                        <button id="showFormBtn" class="btn btn-secondary" type="button">Añadir más</button>
                    </div>
                    <div id="addMoreForm" style="display: none;">
                        <div class="vehicle_card">
                            <form action="{{ route('add_vehicle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
                                <div class="form-group vehicle_form">
                                    <select name="vehicle" class="form-control">
                                        <option value="" selected disabled>Elige tu vehículo</option>
                                        <option value="car">Coche</option>
                                        <option value="bike">Moto</option>
                                    </select>
                                </div>
                                <div class="form-group vehicle_form">

                                    <input type="license_plate" name="license_plate" class="form-control"
                                        placeholder="Matrícula" required>
                                </div>
                                <button class="btn btn-outline-primary" type="submit">Añadir</button>
                            </form>
                        </div>
                    </div>

                    @foreach ($user->vehicles as $vehicle)
                        <div class="vehicle_list">
                            <div>
                                <span class="card-title"><strong>Tipo: </strong>{{ $vehicle->type }}</span>
                                <span><strong>Matrícula: </strong> {{ $vehicle->license_plate }}</span>
                            </div>
                            <div>
                                <a href="{{ route('remove_vehicle', ['vehicle_id' => $vehicle->id]) }}"
                                    class="btn btn-outline-danger">Eliminar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script_page')
    <script>
        //Show form to create vehicle 
        document.getElementById('showFormBtn').addEventListener('click', function() {
            var form = document.getElementById('addMoreForm');
            if (form.style.display === 'none') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        });
    </script>
@endsection
