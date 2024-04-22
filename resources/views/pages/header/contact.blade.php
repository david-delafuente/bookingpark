@extends('layouts.layout')
@yield('Contacto')

@section('content')
    <div class="main-content joinus_card">
        <div class="col-md-5 contact_img">
            <img src="{{ asset('images/contact.png') }}" alt="Vip image" class="img-fluid">
        </div>
        <div class="col-md-6 joinus_item2">
            <div class="container">
                <h5 class="mb-4 text-center font">Contacta con nosotros</h5>

                <!-- Form -->
                <!-- It's not funcional right now -->
                <form class="contact" action="#" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <label for="name" class="form-label"></label>
                        <input type="name" id="name" name="name" class="form-control mb-4" placeholder="Nombre">
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label"></label>
                        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Email">
                    </div>
                    <div class="col-md-12">
                        <label for="message" class="form-label"></label>
                        <textarea class="form-control" name="message" id="message" rows="3" maxlength="250" aria-required="true"
                            placeholder="Deja tu mensaje aquí..."></textarea>
                    </div>

                    <button type="submit" class="btn"><ion-icon class="icon" size="large"
                            name="paper-plane-outline"></ion-icon></button>
                </form>

                </p>
            </div>
        </div>
    </div>
@endsection
