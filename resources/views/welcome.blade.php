<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido/a BookingPark</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/welcome.style.css') }}">
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
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Mi perfil</a></li>
                        <li class="nav-item dropdown-item"> <a class="logo_hover" href="{{ route('logout') }}"> <ion-icon
                                    name="log-out-outline"></ion-icon></a></li>
                    </ul>
                </div>
            @endauth
        </div>

    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <!-- Nav lateral -->
                <div class="col-md-3">
                    <div class="sidebar">
                        <!-- Menú desplegable -->
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="{{ route('welcome') }}">Inicio</a></li>
                            <li class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Reservas
                            </li>
                            <ul class="dropdown-menu dropdown-menu">
                                <li><a class="dropdown-item" href="#">Día entero</a></li>
                                <li><a class="dropdown-item" href="#">Por horas</a></li>
                            </ul>
                            <li class="nav-item"><a href="{{ route('joinus') }}">Hazte socio</a></li>

                        </ul>
                    </div>
                </div>
                <!-- Contenido principal -->
                <div class="col-md-9">
                    <!-- Aquí va el contenido principal -->
                    <h2>Reserva por horas</h2>
                </div>
            </div>
        </div>

    </div>

    <div class = "container text-center">
        <input type="text" id="datePicker" name="fecha1" placeholder="Entrada">
        <input type="text" id="datePicker" name="fecha2" placeholder="Salida">
        <button class="btn btn-primary">Reservar</button>
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
    <!-- Flatpickr calendar -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Obtener la hora actual
        const now = new Date();
        const currentHour = now.getHours();

        flatpickr("#datePicker", {
            minDate: "today",
            minuteIncrement: "30",
            dateFormat: "Y-m-d H:i",
            defaultHour: currentHour,
            enableTime: true,
            time_24hr: true
        });
    </script>
</body>

<!-- Agregar aquí tus scripts personalizados -->
</body>

</html>
