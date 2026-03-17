<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ \App\Services\LanguageService::getDirection() }}" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <title>{{ __('Tracko - Smart Pump Management System') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="{{ __('Advanced Pump Management and Monitoring System') }}" name="description" />
    <meta content="Tracko" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    @foreach(\App\Services\LanguageService::getCssFiles() as $cssFile)
        <link href="{{ asset('assets/css/' . $cssFile) }}" rel="stylesheet" type="text/css" />
    @endforeach
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    @if(app()->getLocale() === 'ur')
        <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body[dir="rtl"] { font-family: 'Noto Nastaliq Urdu', serif !important; }
        </style>
    @endif
    <style>
        .hero-section { background: linear-gradient(135deg, #10b981 0%, #059669 100%); min-height: 100vh; }
        .hero-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; }
        .hero-metric { background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); }
        .feature-icon { width: 60px; height: 60px; }
        .pump-card { transition: transform 0.3s ease; }
        .pump-card:hover { transform: translateY(-5px); }
        .stats-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); }
    </style>
</head>

<body>
    @yield('content')

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/iconify-icon/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>