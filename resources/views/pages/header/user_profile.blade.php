<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido/a BookingPark</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/user_profile.style.css') }}">
    <!-- Flatpickr css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <img src="{{ asset('images/logo_4.png') }}" alt="Logo de tu empresa" class="logo">
            <!-- Logout button -->
            @auth
                <div class="header_text">
                    <li class="dropdown-toggle list-unstyled" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </li>
                    <ul class="dropdown-menu dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                        <li class="nav-item dropdown-item"> <a class="logo_hover" href="{{ route('logout') }}"> <ion-icon
                                    name="log-out-outline"></ion-icon></a></li>
                    </ul>
                </div>
            @endauth
        </div>

    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <a href="{{ route('welcome') }}" class="btn">
            <ion-icon size="large" name="arrow-back-outline"></ion-icon>
        </a>
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mb-4">
                            <h2>Mi perfil</h2>
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
                                    <a href="#" class="btn btn-danger">Cancelar
                                        membresía</a>
                                </div>
                            </div>

                        </div>
                        <div class="container"></div>

                        <div class="col-md-6">
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

                        <div class="col-md-6">
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
            </div>
        </div>

    </div>
    <!-- JavaScript opcional (para funcionalidades adicionales) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <!--icons-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

<!-- Agregar aquí tus scripts personalizados -->
</body>

</html>
