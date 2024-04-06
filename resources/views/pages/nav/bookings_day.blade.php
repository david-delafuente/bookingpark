@extends('layouts.layout')
@section('title', 'Reserva por día')

@section('content')
    <a href="{{ route('welcome') }}" class="btn_user_profile">
        <ion-icon size="large" name="arrow-back-outline"></ion-icon>
    </a>

    <div class="main-content">
        <div class=" col-md-8 row1 ">
            <!-- Contenido principal -->
            <div class="col-md-9">
                @include('layouts.partials.message')
                <!-- Aquí va el contenido principal -->
                <h2>Reserva por días</h2>
            </div>
        </div>
    </div>
    <form action="{{ route('show_parkings') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <select class="form-control mb-3" name="district" id="district">
                        <option value="" selected disabled>Elige el distrito</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary btn-block">Parkings disponibles</button>
                </div>
            </div>
        </div>
    </form>


    @if (isset($parkings))
        @include('layouts.partials.cards.parking_card')
    @endif

@endsection
