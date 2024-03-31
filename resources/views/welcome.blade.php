@extends('layouts.layout')
@section('title', 'Inicio')

@section('content')
    <div class="main-content">
        <!-- Contenido principal -->
        <div class="">
            @include('layouts.partials.message')

            <!-- row 1 -->
            <div class=" row1 img_text">
                <div class="item1">
                    <img class="image_home" src="{{ asset('images/home.jpg') }}" alt="">
                </div>
                <div class="item2">
                    <h4>Tu web de reservas de aparcamiento de confianza</h4>
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

@section('footer')
    @include('layouts.partials.footer')
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
