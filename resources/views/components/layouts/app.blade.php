<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.layouts.head')
</head>
<body>
@include('components.layouts.nav')

<div class="main-content">
    @yield('content')
</div>

@include('components.layouts.footer')
</body>
</html>
