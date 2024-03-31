<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingPark</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregar aquí tus estilos personalizados -->
    <style>
        /* Estilos personalizados */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            text-align: center;
        }

        .container h5 {
            margin-bottom: 50px;
        }

        .logo {
            width: 250px;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/logo_2.png') }}" alt="Logo de tu empresa" class="logo">
        <h1>Bienvenido/a </h1>
        <h5>a la plataforma líder en gestión de reservas de parking online</h5>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('login') }}" class="btn btn-primary btn-block">Entrar</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-block">Registrarse</a>
            </div>
        </div>
    </div>

    <!-- JavaScript opcional (para funcionalidades adicionales) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Agregar aquí tus scripts personalizados -->
</body>

</html>
