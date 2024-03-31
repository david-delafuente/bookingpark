@extends('layouts.layout')
@section('title', 'Reserva por horas')

@section('content')
    <!-- Contenido principal -->
    <div class="main-content">
        <div class=" col-md-6 row1">
            <!-- Contenido principal -->
            <div class="col-md-9">
                @include('layouts.partials.message')
                <!-- Aquí va el contenido principal -->
                <h2>Reserva por horas</h2>
            </div>
        </div>
    </div>

    <div class = "text-center">
        <input type="text" id="datePicker" name="fecha1" placeholder="Entrada">
        <input type="text" id="datePicker" name="fecha2" placeholder="Salida">
        <button class="btn btn-primary">Reservar</button>
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
            dateFormat: "Y-m-d H:i",
            defaultHour: currentHour,
            enableTime: true,
            time_24hr: true
        });
    </script>
@endsection
