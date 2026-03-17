<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Tracko - Petrol Pump Management')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <link href="{{ asset('plugins/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="{{ asset('css/tracko-admin.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>
    @include('components.loader')

    @include('components.sidebar')
    @include('components.header')
    <main class="tracko-main" id="main-content">
        @yield('content')
    </main>
    @include('components.footer')
    <script src="{{ asset('plugins/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    @stack('scripts')
</body>

</html>
