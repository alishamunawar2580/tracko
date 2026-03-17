@extends('layouts.landing')

@section('content')
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: rgba(0,0,0,0.1); backdrop-filter: blur(10px);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="Tracko" height="32" class="me-2">
            <span class="fw-bold fs-4">Tracko</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#features">{{ __('landing.Features') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#monitoring">{{ __('landing.Monitoring') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">{{ __('landing.Contact') }}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ __('landing.Language') }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?lang=en">{{ __('landing.English') }}</a></li>
                        <li><a class="dropdown-item" href="?lang=ur">{{ __('landing.Urdu') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="btn btn-light text-primary ms-2" href="/dashboard">{{ __('landing.Login') }}</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="badge bg-white bg-opacity-20 text-white mb-3">{{ __('landing.Industrial IoT Solution') }}</div>
                <h1 class="display-3 fw-bold mb-4">{{ __('landing.Advanced Pump Management & Monitoring') }}</h1>
                <p class="lead mb-4">{{ __('landing.Revolutionize your industrial operations') }}</p>
                
                <div class="hero-grid mb-4">
                    <div class="hero-metric p-3 rounded">
                        <h4 class="fw-bold mb-1">40% {{ __('landing.Cost Reduction') }}</h4>
                        <small>{{ __('landing.Energy & Maintenance') }}</small>
                    </div>
                    <div class="hero-metric p-3 rounded">
                        <h4 class="fw-bold mb-1">{{ __('landing.Zero Downtime') }}</h4>
                        <small>{{ __('landing.Predictive Alerts') }}</small>
                    </div>
                </div>
                
                <div class="d-flex gap-3 mb-4">
                    <a href="/dashboard" class="btn btn-light btn-lg px-4">{{ __('landing.Start Free Trial') }}</a>
                    <a href="#features" class="btn btn-outline-light btn-lg px-4">{{ __('landing.View Demo') }}</a>
                </div>
                
                <div class="d-flex align-items-center gap-4">
                    <div class="text-center">
                        <h5 class="fw-bold mb-0">1000+</h5>
                        <small class="opacity-75">Active Pumps</small>
                    </div>
                    <div class="text-center">
                        <h5 class="fw-bold mb-0">50+</h5>
                        <small class="opacity-75">Countries</small>
                    </div>
                    <div class="text-center">
                        <h5 class="fw-bold mb-0">99.9%</h5>
                        <small class="opacity-75">Uptime SLA</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="bg-white bg-opacity-15 p-4 rounded-3 text-center">
                            <iconify-icon icon="solar:chart-bold-duotone" class="fs-1 mb-2"></iconify-icon>
                            <h6>Real-time Analytics</h6>
                            <small class="opacity-75">Live performance data</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-15 p-4 rounded-3 text-center">
                            <iconify-icon icon="solar:shield-check-bold-duotone" class="fs-1 mb-2"></iconify-icon>
                            <h6>Predictive AI</h6>
                            <small class="opacity-75">Prevent failures</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-15 p-4 rounded-3 text-center">
                            <iconify-icon icon="solar:smartphone-bold-duotone" class="fs-1 mb-2"></iconify-icon>
                            <h6>Mobile Control</h6>
                            <small class="opacity-75">Remote management</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-15 p-4 rounded-3 text-center">
                            <iconify-icon icon="solar:energy-bold-duotone" class="fs-1 mb-2"></iconify-icon>
                            <h6>Energy Savings</h6>
                            <small class="opacity-75">Optimize consumption</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold">Comprehensive Pump Management</h2>
                <p class="text-muted">Advanced features designed for industrial pump operations</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card pump-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <iconify-icon icon="solar:chart-bold-duotone" class="fs-2 text-primary"></iconify-icon>
                        </div>
                        <h5 class="fw-semibold">Performance Analytics</h5>
                        <p class="text-muted">Track pump efficiency, flow rates, and energy consumption with detailed analytics.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pump-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <iconify-icon icon="solar:bell-bing-bold-duotone" class="fs-2 text-success"></iconify-icon>
                        </div>
                        <h5 class="fw-semibold">Smart Alerts</h5>
                        <p class="text-muted">Receive instant notifications for maintenance needs, anomalies, and system issues.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pump-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <iconify-icon icon="solar:shield-check-bold-duotone" class="fs-2 text-warning"></iconify-icon>
                        </div>
                        <h5 class="fw-semibold">Predictive Maintenance</h5>
                        <p class="text-muted">AI-powered predictions to prevent failures and optimize maintenance schedules.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pump-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <iconify-icon icon="solar:database-bold-duotone" class="fs-2 text-info"></iconify-icon>
                        </div>
                        <h5 class="fw-semibold">Data Management</h5>
                        <p class="text-muted">Centralized data storage with historical trends, reports, and compliance documentation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pump-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <iconify-icon icon="solar:smartphone-bold-duotone" class="fs-2 text-danger"></iconify-icon>
                        </div>
                        <h5 class="fw-semibold">Remote Control</h5>
                        <p class="text-muted">Control pumps remotely via mobile app with secure authentication and real-time feedback.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pump-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-secondary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <iconify-icon icon="solar:energy-bold-duotone" class="fs-2 text-secondary"></iconify-icon>
                        </div>
                        <h5 class="fw-semibold">Energy Optimization</h5>
                        <p class="text-muted">Reduce energy costs by up to 30% with intelligent scheduling and variable speed control.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technical Specifications -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold">Technical Specifications</h2>
                <p class="text-muted">Built for industrial-grade reliability and performance</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-semibold mb-3">System Capabilities</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Maximum Pumps per System</span>
                                <strong>1000+</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Data Sampling Rate</span>
                                <strong>1-60 seconds</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Historical Data Storage</span>
                                <strong>10+ years</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Communication Protocols</span>
                                <strong>Modbus, TCP/IP, RS485</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span>Operating Temperature</span>
                                <strong>-40°C to +85°C</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-semibold mb-3">Monitoring Parameters</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="bg-primary bg-opacity-10 p-3 rounded text-center">
                                    <iconify-icon icon="solar:speedometer-bold" class="fs-3 text-primary"></iconify-icon>
                                    <h6 class="mt-2 mb-0">Flow Rate</h6>
                                    <small class="text-muted">L/min, m³/h</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-success bg-opacity-10 p-3 rounded text-center">
                                    <iconify-icon icon="solar:pressure-bold" class="fs-3 text-success"></iconify-icon>
                                    <h6 class="mt-2 mb-0">Pressure</h6>
                                    <small class="text-muted">bar, PSI</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-warning bg-opacity-10 p-3 rounded text-center">
                                    <iconify-icon icon="solar:thermometer-bold" class="fs-3 text-warning"></iconify-icon>
                                    <h6 class="mt-2 mb-0">Temperature</h6>
                                    <small class="text-muted">°C, °F</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-info bg-opacity-10 p-3 rounded text-center">
                                    <iconify-icon icon="solar:bolt-bold" class="fs-3 text-info"></iconify-icon>
                                    <h6 class="mt-2 mb-0">Power</h6>
                                    <small class="text-muted">kW, HP</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold">Industries We Serve</h2>
                <p class="text-muted">Trusted by leading companies across various sectors</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <iconify-icon icon="solar:buildings-bold-duotone" class="fs-1 text-primary mb-2"></iconify-icon>
                    <h6>Manufacturing</h6>
                    <small class="text-muted">Industrial processes</small>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <iconify-icon icon="solar:water-bold-duotone" class="fs-1 text-info mb-2"></iconify-icon>
                    <h6>Water Treatment</h6>
                    <small class="text-muted">Municipal & industrial</small>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <iconify-icon icon="solar:oil-bold-duotone" class="fs-1 text-warning mb-2"></iconify-icon>
                    <h6>Oil & Gas</h6>
                    <small class="text-muted">Upstream & downstream</small>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <iconify-icon icon="solar:leaf-bold-duotone" class="fs-1 text-success mb-2"></iconify-icon>
                    <h6>Agriculture</h6>
                    <small class="text-muted">Irrigation systems</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Monitoring Dashboard Preview -->
<section id="monitoring" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Real-time Monitoring Dashboard</h2>
                <p class="text-muted mb-4">Get complete visibility into your pump operations with our intuitive dashboard interface.</p>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-2">
                        <iconify-icon icon="solar:check-circle-bold" class="text-success me-2"></iconify-icon>
                        Live pump status and performance metrics
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <iconify-icon icon="solar:check-circle-bold" class="text-success me-2"></iconify-icon>
                        Historical data analysis and trends
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <iconify-icon icon="solar:check-circle-bold" class="text-success me-2"></iconify-icon>
                        Customizable alerts and notifications
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <iconify-icon icon="solar:check-circle-bold" class="text-success me-2"></iconify-icon>
                        Mobile-responsive design
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Pump Status Overview</h6>
                            <span class="badge bg-success">Online</span>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <h4 class="text-primary mb-1">85%</h4>
                                    <small class="text-muted">Efficiency</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <h4 class="text-success mb-1">2.5 bar</h4>
                                    <small class="text-muted">Pressure</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <h4 class="text-warning mb-1">150 L/min</h4>
                                    <small class="text-muted">Flow Rate</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <h4 class="text-info mb-1">45°C</h4>
                                    <small class="text-muted">Temperature</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-success text-white">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="fw-bold mb-3">Ready to Optimize Your Pump Operations?</h2>
                <p class="lead mb-4">Join hundreds of companies already using Tracko to improve their pump efficiency and reduce maintenance costs.</p>
                <a href="/dashboard" class="btn btn-light btn-lg text-success">Start Free Trial</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="contact" class="py-4 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="Tracko" height="24" class="me-2">
                    <span class="fw-bold">Tracko</span>
                </div>
                <p class="text-muted mb-0">Smart Pump Management System</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="text-muted mb-0">&copy; 2024 Tracko. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
@endsection