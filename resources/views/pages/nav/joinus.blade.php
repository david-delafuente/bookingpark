@extends('layouts.layout')
@section('title', 'Únete a nosotros')

@section('content')
    <div class="main-content joinus_card">
        <div class="col-md-5 ">
            <img src="{{ asset('images/vip.png') }}" alt="Vip image" class="img-fluid">
        </div>
        <div class="col-md-6 joinus_item2">
            <div class="container">
                <h5 class="mb-4 text-center font">¡Únete y disfruta de beneficios exclusivos!</h5>

                <!-- Form -->
                <form class="joinus" action="{{ route('joinus') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
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
@endsection
