<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazte Socio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/joinus.style.css') }}">
</head>

<body>
    <div class="text-center logo">
        <img src="{{ asset('images/logo_4.png') }}" alt="Logo de tu empresa" class="logo">
    </div>
    <div class="container">

        <a href="{{ route('welcome') }}" class="btn">
            <ion-icon size="large" name="arrow-back-outline"></ion-icon>
        </a>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/vip.png') }}" alt="Vip image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="container">
                    <h5 class="mb-4 text-center">¡Únete y disfruta de beneficios exclusivos!</h5>

                    <!-- Formulario de registro -->
                    <form class="example" action="{{ route('joinus') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label"></label>
                            <input type="email" id="email" name="email" class="form-control mb-4"
                                placeholder="Introduce tu email">
                        </div>
                        <button type="submit" class="btn"><ion-icon class="icon" size="large"
                                name="paper-plane-outline"></ion-icon></button>
                    </form>

                    <p class="mt-4 text-center">¡Totalmente gratuito, simplemente recibirás newsletter 1 vez al mes!
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript opcional (para funcionalidades adicionales) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--icons-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
