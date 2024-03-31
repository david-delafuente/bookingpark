@extends('layouts.layout')
@section('title', 'Perfil de usuario')

@section('content')
    <!-- Contenido principal -->
    <a href="{{ route('welcome') }}" class="btn_user_profile">
        <ion-icon size="large" name="arrow-back-outline"></ion-icon>
    </a>
    <div class="user_profile_container">
        @include('layouts.partials.message')
        <div class="back_btn_container">
            <h2>Mi perfil</h2>
        </div>

        <div class="col-md-6 user_block">
            <div class="card">
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Tipo de membresía:</strong>
                        @if (auth()->user()->membership_id == 1)
                            Básica
                        @elseif(auth()->user()->membership_id == 2)
                            Premium
                        @endif
                    </p>

                    <a href="{{ route('membership_cancel') }}" class="btn btn-danger">
                        Cancelar membresía
                    </a>

                </div>
            </div>
        </div>

        <div class="user_list">
            <div class="col-md-4 user_autos">
                <div class="card">
                    <h2>Mis vehículos</h2>
                    @foreach ($user->vehicles as $vehicle)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $vehicle->type }}</h5>
                                <p><strong>Matrícula:</strong> {{ $vehicle->license_plate }}</p>
                                <!-- Otros detalles del vehículo -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4 user_bookings">
                <div class="card">

                    <h2>Mis reservas activas</h2>
                    {{--     @foreach ($user->reservations as $reservation)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $reservation->parking->name }}</h5>
                                    <p><strong>Fecha de inicio:</strong> {{ $reservation->start_date }}</p>
                                    <p><strong>Fecha de fin:</strong> {{ $reservation->end_date }}</p>
                                    <!-- Otros detalles de la reserva -->
                                </div>
                            </div>
                        @endforeach --}}
                </div>
            </div>
        </div>

    </div>


@endsection
