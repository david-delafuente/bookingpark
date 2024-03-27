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

    <div class="main-content row">
        <!-- Nav lateral (Sidecar) -->
        <div class="col-md-3">
            <div class="sidebar">
                <!-- Menú desplegable -->
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="{{ route('welcome') }}">Inicio</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Reservas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('bookings_day') }}">Día entero</a></li>
                            <li><a class="dropdown-item" href="{{ route('bookings_hour') }}">Por horas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{ route('joinus') }}">Hazte socio</a></li>
                </ul>
            </div>
        </div>
        <!-- Contenido principal -->
        <div class="col-md-9">
            @include('partials.message')

            <!-- row 1 -->
            <div class=" row1 img_text">
                <div class="item1">
                    <img class="image_home" src="{{ asset('images/home.jpg') }}" alt="">
                </div>
                <div class="item2">
                    <h4>Tu reserva de plazas de aparcamiento de confianza</h4>
                    <br>
                    <p>Localiza el parking que más te convenga entre los más de 200 disponibles en nuestra red en la
                        ciudad condal.</p>

                </div>
            </div>

            <!-- row 2 -->
            <div class="img_text">
                <div class="item2">
                    <h4>Y si lo necesitas, siendo miembro premium tendrás acceso a una bicicleta o patinete eléctricos,
                        para tu desplazamiento final</h4>
                    <br>
                    <p>Pregunta la disponibilidad en tu local favorito.</p>
                </div>
                <div class="item1">
                    <img class="image_home" src="{{ asset('images/home2.jpg') }}" alt="">
                </div>
            </div>

            <!-- row 3 -->
            <div class="img_text">
                <div class="item1">
                    <img class="image_home" src="{{ asset('images/home3.jpg') }}" alt="">
                </div>
                <div class="item2">
                    <h4>¡Tan solo a 1 click!</h4>
                    <br>
                    <p>Sencillo y rápido, nunca ha sido tan fácil.</p>
                </div>
            </div>



        </div>
    </div>



    <!--Javascript for Flash Messages-->
    <script src="{{ asset('js/flash_message.js') }}"></script>
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
