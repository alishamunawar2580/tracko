<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Tracko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Tracko - Professional Petrol Pump Management System" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link href="{{ asset('css/tracko-auth.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .notification-container {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-width: 420px;
        }
        
        .notification {
            background: white;
            border-radius: 12px;
            padding: 16px 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12), 0 2px 8px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: flex-start;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
            border-left: 4px solid;
            min-width: 320px;
        }
        
        .notification.error {
            border-left-color: #dc3545;
        }
        
        .notification.success {
            border-left-color: #28a745;
        }
        
        .notification-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 14px;
            font-weight: bold;
        }
        
        .notification.error .notification-icon {
            background: #fee;
            color: #dc3545;
        }
        
        .notification.success .notification-icon {
            background: #d4edda;
            color: #28a745;
        }
        
        .notification-content {
            flex: 1;
        }
        
        .notification-title {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 4px;
            color: #1a1a1a;
        }
        
        .notification-message {
            font-size: 13px;
            color: #666;
            line-height: 1.5;
        }
        
        .notification-close {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 0;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            transition: all 0.2s;
            flex-shrink: 0;
        }
        
        .notification-close:hover {
            background: #f5f5f5;
            color: #333;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }
        
        .notification.hiding {
            animation: slideOut 0.3s ease-in forwards;
        }
        
        .password-wrapper {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #999;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }
        
        .password-toggle:hover {
            color: #333;
        }
        
        .password-toggle svg {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body class="auth-page">
    <!-- Notification Container -->
    <div class="notification-container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="notification error">
                    <div class="notification-icon">✕</div>
                    <div class="notification-content">
                        <div class="notification-title">Authentication Error</div>
                        <div class="notification-message">{{ $error }}</div>
                    </div>
                    <button class="notification-close" onclick="closeNotification(this)">×</button>
                </div>
            @endforeach
        @endif

        @if(session('error'))
            <div class="notification error">
                <div class="notification-icon">✕</div>
                <div class="notification-content">
                    <div class="notification-title">Error</div>
                    <div class="notification-message">{{ session('error') }}</div>
                </div>
                <button class="notification-close" onclick="closeNotification(this)">×</button>
            </div>
        @endif

        @if(session('success'))
            <div class="notification success">
                <div class="notification-icon">✓</div>
                <div class="notification-content">
                    <div class="notification-title">Success</div>
                    <div class="notification-message">{{ session('success') }}</div>
                </div>
                <button class="notification-close" onclick="closeNotification(this)">×</button>
            </div>
        @endif
    </div>
    <div class="auth-container">
        <!-- Left Side - 60% -->
        <div class="auth-left">
            <div class="floating-balls">
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>


            <div class="auth-features">
                <div class="feature-card">
                    <div class="feature-icon">⛽</div>
                    <h3>Fuel Management</h3>
                    <p>Track fuel inventory, dispensers, and nozzles in real-time</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Analytics</h3>
                    <p>Comprehensive reports and insights for better decisions</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Pricing Control</h3>
                    <p>Dynamic pricing management and revenue tracking</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Secure & Reliable</h3>
                    <p>Enterprise-grade security for your business data</p>
                </div>
            </div>
        </div>

        <!-- Right Side - 40% -->
        <div class="auth-right">
            <div class="auth-form-container">
                <div class="auth-brand-form">
                    <h1>TRACK<span class="gradient-o">O</span></h1>
                </div>

                <div class="auth-form-header">
                    <h2>Welcome Back</h2>
                    <p>Sign in to access your dashboard</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST" id="loginForm">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Enter your password" required>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="#" class="forgot-link">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn-login">Sign In</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function closeNotification(btn) {
            const notification = btn.closest('.notification');
            notification.classList.add('hiding');
            setTimeout(() => notification.remove(), 300);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const notifications = document.querySelectorAll('.notification');
            notifications.forEach(notification => {
                setTimeout(() => {
                    notification.classList.add('hiding');
                    setTimeout(() => notification.remove(), 300);
                }, 5000);
            });
        });
        
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>
</body>

</html>
