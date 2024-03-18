<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BookingPark</title>

    </head>
    <body>
      @foreach ($users as $user)
          <h1>Name: {{ $user->name }}</h1>
          <h1>E-mail: {{ $user->email }}</h1>
          <h1>Vehicles: </h1>
              <ul>
                @foreach ($user->vehicles as $vehicle)
                    <li>{{ $vehicle->type }} - {{ $vehicle->license_plate }}</li>
                @endforeach
              </ul>
          <h1>Membresía: {{ $user->membership->type }}</h1>
      @endforeach
    </body>
</html>
