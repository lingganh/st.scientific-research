<!DOCTYPE html>
<html lang="en">

    @include('components.layouts.head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }}</title>

         <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />




        @livewireStyles
    </head>

<body>
@include('components.layouts.nav')

<div class="main-content">
    @yield('content')
</div>

@include('components.layouts.footer')




 </body>
</html>
