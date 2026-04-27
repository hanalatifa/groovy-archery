<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Groovy Archery Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            display: flex;
            overflow: hidden;
            background: #0a0e1a;
        }

        /* ════════════════════════════════
           LEFT PANEL — Visual
        ════════════════════════════════ */
        .login-visual {
            flex: 1;
            position: relative;
            overflow: hidden;
            display: none;
        }

        @media (min-width: 1024px) { .login-visual { display: block; } }

        .login-visual-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #0d1b3e 0%, #1a0a2e 40%, #0d1b3e 100%);
        }

        /* Lingkaran target panahan dekoratif */
        .archery-target {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .target-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid rgba(255,255,255,0.06);
        }

        .ring-1  { width: 600px; height: 600px; border-color: rgba(255,255,255,0.04); }
        .ring-2  { width: 480px; height: 480px; border-color: rgba(255,255,255,0.06); }
        .ring-3  { width: 360px; height: 360px; border-color: rgba(43,69,154,0.25); }
        .ring-4  { width: 260px; height: 260px; border-color: rgba(43,69,154,0.35); }
        .ring-5  { width: 170px; height: 170px; border-color: rgba(43,69,154,0.5); background: rgba(43,69,154,0.08); }
        .ring-6  { width: 90px;  height: 90px;  background: rgba(43,69,154,0.3); border-color: rgba(43,69,154,0.6); }
        .ring-7  { width: 32px;  height: 32px;  background: #2b459a; border: none; }

        /* Arrow dekoratif */
        .deco-arrow {
            position: absolute;
            opacity: 0.15;
        }

        .arrow-1 { top: 12%; left: 8%; transform: rotate(45deg); }
        .arrow-2 { bottom: 18%; right: 10%; transform: rotate(-30deg); }
        .arrow-3 { top: 55%; left: 5%; transform: rotate(10deg); }

        /* Garis crosshair */
        .crosshair-h {
            position: absolute;
            top: 50%;
            left: 0; right: 0;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(43,69,154,0.3), rgba(43,69,154,0.5), rgba(43,69,154,0.3), transparent);
            transform: translateY(-50%);
        }
        .crosshair-v {
            position: absolute;
            left: 50%;
            top: 0; bottom: 0;
            width: 1px;
            background: linear-gradient(to bottom, transparent, rgba(43,69,154,0.3), rgba(43,69,154,0.5), rgba(43,69,154,0.3), transparent);
            transform: translateX(-50%);
        }

        /* Noise texture overlay */
        .visual-noise {
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            opacity: 0.4;
        }

        /* Teks overlay di visual */
        .visual-content {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 48px;
            background: linear-gradient(to top, rgba(10,14,26,0.95) 0%, transparent 100%);
        }

        .visual-tag {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: rgba(43,69,154,0.9);
            margin-bottom: 12px;
            display: block;
        }

        .visual-headline {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1.8rem, 3vw, 2.6rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .visual-sub {
            font-size: 13px;
            color: rgba(255,255,255,0.45);
            line-height: 1.7;
            max-width: 320px;
        }

        /* Animasi pulse pada target tengah */
        @keyframes targetPulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(43,69,154,0.4); }
            50%       { box-shadow: 0 0 0 20px rgba(43,69,154,0); }
        }
        .ring-7 { animation: targetPulse 3s ease infinite; }

        /* Floating particles */
        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(43,69,154,0.6);
            border-radius: 50%;
            animation: float linear infinite;
        }

        @keyframes float {
            0%   { transform: translateY(100vh) translateX(0); opacity: 0; }
            10%  { opacity: 1; }
            90%  { opacity: 1; }
            100% { transform: translateY(-100px) translateX(30px); opacity: 0; }
        }

        /* ════════════════════════════════
           RIGHT PANEL — Form
        ════════════════════════════════ */
        .login-form-panel {
            width: 100%;
            max-width: 520px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 40px;
            background: #0a0e1a;
            position: relative;
            overflow: hidden;
        }

        @media (min-width: 1024px) {
            .login-form-panel { border-left: 1px solid rgba(255,255,255,0.05); }
        }

        /* Subtle bg gradient di form panel */
        .login-form-panel::before {
            content: '';
            position: absolute;
            top: -200px; right: -200px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(43,69,154,0.12), transparent 70%);
            pointer-events: none;
        }
        .login-form-panel::after {
            content: '';
            position: absolute;
            bottom: -150px; left: -150px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(133,72,143,0.08), transparent 70%);
            pointer-events: none;
        }

        /* Logo area */
        .form-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 52px;
            position: relative;
            z-index: 1;
        }

        .logo-mark {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2b459a, #85488F);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .logo-text-wrap .logo-name {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 14px;
            color: #fff;
            letter-spacing: 0.5px;
            line-height: 1;
        }
        .logo-text-wrap .logo-sub {
            font-size: 10px;
            color: rgba(255,255,255,0.35);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 3px;
        }

        /* Heading form */
        .form-heading {
            margin-bottom: 36px;
            position: relative;
            z-index: 1;
        }

        .form-eyebrow {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #2b459a;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-eyebrow::before {
            content: '';
            display: inline-block;
            width: 20px; height: 2px;
            background: #2b459a;
            border-radius: 2px;
        }

        .form-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1.8rem, 4vw, 2.4rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .form-title em {
            font-style: italic;
            color: rgba(255,255,255,0.5);
        }

        .form-desc {
            font-size: 13px;
            color: rgba(255,255,255,0.35);
            line-height: 1.6;
        }

        /* Input group */
        .input-group {
            position: relative;
            z-index: 1;
            margin-bottom: 20px;
        }

        .input-label {
            display: block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            margin-bottom: 8px;
            transition: color 0.2s ease;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.2);
            transition: color 0.2s ease;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px 14px 44px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 10px;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            outline: none;
            transition: all 0.25s ease;
        }

        .form-input::placeholder { color: rgba(255,255,255,0.18); }

        .form-input:focus {
            background: rgba(43,69,154,0.12);
            border-color: rgba(43,69,154,0.6);
            box-shadow: 0 0 0 4px rgba(43,69,154,0.1);
        }

        .input-group:focus-within .input-label { color: rgba(43,69,154,0.9); }
        .input-group:focus-within .input-icon  { color: rgba(43,69,154,0.7); }

        /* Password toggle */
        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255,255,255,0.25);
            cursor: pointer;
            padding: 4px;
            transition: color 0.2s ease;
            display: flex;
        }
        .toggle-password:hover { color: rgba(255,255,255,0.6); }

        /* Error message */
        .input-error {
            font-size: 11px;
            color: #f87171;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Session status */
        .session-status {
            padding: 12px 16px;
            background: rgba(34,197,94,0.1);
            border: 1px solid rgba(34,197,94,0.2);
            border-radius: 8px;
            font-size: 12px;
            color: #4ade80;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        /* Remember + forgot */
        .form-footer-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            position: relative;
            z-index: 1;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .remember-checkbox {
            appearance: none;
            width: 16px; height: 16px;
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 4px;
            background: rgba(255,255,255,0.04);
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .remember-checkbox:checked {
            background: #2b459a;
            border-color: #2b459a;
        }

        .remember-checkbox:checked::after {
            content: '';
            position: absolute;
            top: 2px; left: 5px;
            width: 5px; height: 8px;
            border: 2px solid #fff;
            border-top: none;
            border-left: none;
            transform: rotate(45deg);
        }

        .remember-text {
            font-size: 12px;
            color: rgba(255,255,255,0.35);
        }

        .forgot-link {
            font-size: 12px;
            color: rgba(255,255,255,0.35);
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .forgot-link:hover { color: #2b459a; }

        /* Submit button */
        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #2b459a, #3d5bc7);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #3d5bc7, #2b459a);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .login-btn:hover::before { opacity: 1; }
        .login-btn:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(43,69,154,0.4); }
        .login-btn:active { transform: translateY(0); box-shadow: none; }

        .login-btn span { position: relative; z-index: 1; display: flex; align-items: center; justify-content: center; gap: 8px; }

        /* Divider */
        .form-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0 0;
            position: relative;
            z-index: 1;
        }
        .form-divider::before, .form-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255,255,255,0.06);
        }
        .form-divider span {
            font-size: 10px;
            color: rgba(255,255,255,0.2);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Back to site link */
        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 12px;
            color: rgba(255,255,255,0.25);
            text-decoration: none;
            margin-top: 16px;
            transition: color 0.2s ease;
            position: relative;
            z-index: 1;
        }
        .back-link:hover { color: rgba(255,255,255,0.6); }

        /* Stagger animation masuk */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .anim-1 { animation: slideUp 0.5s ease 0.1s both; }
        .anim-2 { animation: slideUp 0.5s ease 0.2s both; }
        .anim-3 { animation: slideUp 0.5s ease 0.3s both; }
        .anim-4 { animation: slideUp 0.5s ease 0.4s both; }
        .anim-5 { animation: slideUp 0.5s ease 0.5s both; }
        .anim-6 { animation: slideUp 0.5s ease 0.6s both; }
        .anim-7 { animation: slideUp 0.5s ease 0.7s both; }
    </style>
</head>

<body>

    {{-- ═══════════════════ LEFT — Visual Panel ═══════════════════ --}}
    <div class="login-visual">
        <div class="login-visual-bg"></div>
        <div class="visual-noise"></div>

        {{-- Crosshair --}}
        <div class="crosshair-h"></div>
        <div class="crosshair-v"></div>

        {{-- Target rings --}}
        <div class="archery-target">
            <div class="target-ring ring-1"></div>
            <div class="target-ring ring-2"></div>
            <div class="target-ring ring-3"></div>
            <div class="target-ring ring-4"></div>
            <div class="target-ring ring-5"></div>
            <div class="target-ring ring-6"></div>
            <div class="target-ring ring-7"></div>
        </div>

        {{-- Arrow dekoratif --}}
        <div class="deco-arrow arrow-1">
            <svg width="80" height="8" viewBox="0 0 80 8" fill="none">
                <line x1="0" y1="4" x2="70" y2="4" stroke="white" stroke-width="1.5"/>
                <path d="M68 1L75 4L68 7" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="deco-arrow arrow-2">
            <svg width="60" height="6" viewBox="0 0 60 6" fill="none">
                <line x1="0" y1="3" x2="52" y2="3" stroke="white" stroke-width="1.5"/>
                <path d="M50 0.5L57 3L50 5.5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="deco-arrow arrow-3">
            <svg width="100" height="8" viewBox="0 0 100 8" fill="none">
                <line x1="0" y1="4" x2="90" y2="4" stroke="white" stroke-width="1"/>
                <path d="M88 1L95 4L88 7" stroke="white" stroke-width="1" fill="none" stroke-linecap="round"/>
            </svg>
        </div>

        {{-- Floating particles --}}
        @for($i = 0; $i < 12; $i++)
        <div class="particle" style="
            left: {{ rand(5, 95) }}%;
            animation-duration: {{ rand(8, 20) }}s;
            animation-delay: {{ rand(0, 10) }}s;
            width: {{ rand(1, 3) }}px;
            height: {{ rand(1, 3) }}px;
            opacity: {{ rand(3, 7) / 10 }};
        "></div>
        @endfor

        {{-- Teks bawah --}}
        <div class="visual-content">
            <span class="visual-tag">Admin Panel</span>
            <h2 class="visual-headline">
                Precision in<br><em style="color: rgba(255,255,255,0.4);">every</em> arrow,<br>
                clarity in<br>every decision.
            </h2>
            <p class="visual-sub">
                Panel admin Groovy Archery — kelola atlet, pertandingan, dan dokumentasi klub dari satu tempat.
            </p>
        </div>
    </div>

    {{-- ═══════════════════ RIGHT — Form Panel ═══════════════════ --}}
    <div class="login-form-panel">

        {{-- Logo --}}
        <div class="form-logo anim-1">
            <div class="logo-mark">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="white" stroke-width="1.5"/>
                    <circle cx="12" cy="12" r="5" stroke="white" stroke-width="1.5" stroke-dasharray="2 1.5"/>
                    <circle cx="12" cy="12" r="2" fill="white"/>
                    <line x1="12" y1="2" x2="12" y2="22" stroke="white" stroke-width="1"/>
                    <line x1="2" y1="12" x2="22" y2="12" stroke="white" stroke-width="1"/>
                </svg>
            </div>
            <div class="logo-text-wrap">
                <p class="logo-name">Groovy Archery</p>
                <p class="logo-sub">Admin Panel</p>
            </div>
        </div>

        {{-- Session status --}}
        @if(session('status'))
        <div class="session-status anim-1">
            {{ session('status') }}
        </div>
        @endif

        {{-- Heading --}}
        <div class="form-heading anim-2">
            <p class="form-eyebrow">Selamat datang kembali</p>
            <h1 class="form-title">Masuk ke<br><em>Dashboard</em></h1>
            <p class="form-desc">Gunakan akun admin kamu untuk melanjutkan.</p>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('login') }}" style="position: relative; z-index: 1;">
            @csrf

            {{-- Email --}}
            <div class="input-group anim-3">
                <label for="email" class="input-label">Email</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </span>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-input"
                           placeholder="admin@groovyarchery.com"
                           required autofocus autocomplete="username">
                </div>
                @error('email')
                <p class="input-error">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="input-group anim-4">
                <label for="password" class="input-label">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </span>
                    <input id="password"
                           type="password"
                           name="password"
                           class="form-input"
                           placeholder="••••••••••"
                           required autocomplete="current-password"
                           style="padding-right: 48px;">
                    <button type="button" class="toggle-password" id="togglePassword" aria-label="Toggle password visibility">
                        <svg id="eyeOpen" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg id="eyeClosed" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                <p class="input-error">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Remember + Forgot --}}
            <div class="form-footer-row anim-5">
                <label class="remember-label">
                    <input type="checkbox" id="remember_me" name="remember" class="remember-checkbox">
                    <span class="remember-text">Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit" class="login-btn anim-6">
                <span>
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Masuk ke Dashboard
                </span>
            </button>

        </form>

        {{-- Back to site --}}
        <div class="anim-7">
            <div class="form-divider">
                <span>atau</span>
            </div>
            <a href="{{ url('/') }}" class="back-link">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke halaman utama
            </a>
        </div>

    </div>

    <script>
        // Toggle show/hide password
        const toggleBtn  = document.getElementById('togglePassword');
        const passInput  = document.getElementById('password');
        const eyeOpen    = document.getElementById('eyeOpen');
        const eyeClosed  = document.getElementById('eyeClosed');

        toggleBtn.addEventListener('click', () => {
            const isPassword = passInput.type === 'password';
            passInput.type   = isPassword ? 'text' : 'password';
            eyeOpen.style.display   = isPassword ? 'none'  : 'block';
            eyeClosed.style.display = isPassword ? 'block' : 'none';
        });
    </script>

</body>
</html>