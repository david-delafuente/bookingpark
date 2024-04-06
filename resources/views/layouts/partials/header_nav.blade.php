  <!-- Header -->
  <div class="header d-flex ">
      <div class="container-fluid d-flex justify-content-between align-items-center header_logo">
          <img src="{{ asset('images/logo_4.png') }}" alt="Logo de BookingPark" class="logo">
      </div>
      <div class="container-fluid d-flex justify-content-between align-items-center">
          <ul class="header_nav">
              <li><a class="header_nav_title" href="{{ route('welcome') }}">Inicio</a></li>
              <li class="dropdown">
                  <a class="dropdown-toggle class="header_nav_title"" href="#" role="button"
                      id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Reservas
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="{{ route('booking_day') }}">Día entero</a></li>
                      <li><a class="dropdown-item" href="{{ route('bookings_hour') }}">Por horas</a></li>
                  </ul>
              </li>
              <li class=""><a class="header_nav_title" href="{{ route('joinus') }}">Hazte socio</a></li>
          </ul>

          <!-- Logout button -->
          @auth
              <div class="header_profile">
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
