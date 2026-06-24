<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Halaman Tidak Ditemukan | {{ config('app.name', 'Arini Furniture') }}</title>
    <meta name="description" content="Halaman yang Anda cari tidak ditemukan.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #C8A35F;
            --gold-light: #E8D5A8;
            --gold-dark: #9A7B3F;
            --dark-bg: #0F0D0A;
            --dark-surface: #1A1714;
            --dark-card: #221F1A;
            --text-primary: #F5F0E8;
            --text-secondary: #A09882;
            --text-muted: #6B6355;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
            padding: 2rem 0;
        }

        /* Animated gradient background */
        .bg-gradient {
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 20% 80%, rgba(200, 163, 95, 0.08) 0%, transparent 70%),
                radial-gradient(ellipse 60% 80% at 80% 20%, rgba(200, 163, 95, 0.05) 0%, transparent 70%),
                radial-gradient(ellipse 50% 50% at 50% 50%, rgba(200, 163, 95, 0.03) 0%, transparent 70%);
            animation: gradientShift 8s ease-in-out infinite alternate;
        }

        @keyframes gradientShift {
            0% {
                opacity: 0.6;
                transform: scale(1);
            }

            100% {
                opacity: 1;
                transform: scale(1.1);
            }
        }

        /* Floating particles */
        .particles {
            position: fixed;
            inset: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--gold);
            border-radius: 50%;
            opacity: 0;
            animation: floatParticle linear infinite;
        }

        .particle:nth-child(1) {
            left: 10%;
            animation-duration: 12s;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            left: 20%;
            animation-duration: 15s;
            animation-delay: 2s;
        }

        .particle:nth-child(3) {
            left: 35%;
            animation-duration: 11s;
            animation-delay: 4s;
        }

        .particle:nth-child(4) {
            left: 50%;
            animation-duration: 14s;
            animation-delay: 1s;
        }

        .particle:nth-child(5) {
            left: 65%;
            animation-duration: 13s;
            animation-delay: 3s;
        }

        .particle:nth-child(6) {
            left: 75%;
            animation-duration: 16s;
            animation-delay: 5s;
        }

        .particle:nth-child(7) {
            left: 85%;
            animation-duration: 10s;
            animation-delay: 2.5s;
        }

        .particle:nth-child(8) {
            left: 92%;
            animation-duration: 12s;
            animation-delay: 1.5s;
        }

        @keyframes floatParticle {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }

            10% {
                opacity: 0.6;
            }

            90% {
                opacity: 0.6;
            }

            100% {
                transform: translateY(-10vh) scale(1);
                opacity: 0;
            }
        }

        /* Grid pattern overlay */
        .grid-pattern {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(200, 163, 95, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200, 163, 95, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }

        /* Main container */
        .container-404 {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 1.5rem;
            max-width: 560px;
            width: 100%;
        }

        /* SVG illustration */
        .illustration {
            margin: 0 auto 1rem;
            width: 120px;
            height: 120px;
            position: relative;
        }

        .illustration svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 0 40px rgba(200, 163, 95, 0.2));
        }

        .illustration svg .chair-line {
            stroke: var(--gold);
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 800;
            stroke-dashoffset: 800;
            animation: drawLine 2s ease-out forwards;
        }

        .illustration svg .chair-line-delayed {
            animation-delay: 0.5s;
        }

        .illustration svg .broken-piece {
            stroke: var(--gold-light);
            stroke-width: 1.5;
            fill: none;
            opacity: 0;
            animation: fadeInBounce 0.6s ease-out 1.8s forwards;
            transform-origin: center;
        }

        @keyframes drawLine {
            to {
                stroke-dashoffset: 0;
            }
        }

        @keyframes fadeInBounce {
            0% {
                opacity: 0;
                transform: translateY(-10px) rotate(-5deg);
            }

            60% {
                transform: translateY(2px) rotate(2deg);
            }

            100% {
                opacity: 0.7;
                transform: translateY(0) rotate(0deg);
            }
        }

        /* 404 number */
        .error-code {
            font-family: 'Playfair Display', serif;
            font-size: clamp(4rem, 12vw, 7rem);
            font-weight: 900;
            line-height: 1;
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 40%, var(--gold-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.25rem;
            position: relative;
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .error-code::after {
            content: '';
            position: absolute;
            bottom: 0.15em;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            border-radius: 2px;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Glass card */
        .glass-card {
            background: rgba(34, 31, 26, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(200, 163, 95, 0.15);
            border-radius: 20px;
            padding: 2rem 2rem;
            margin-top: 1rem;
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards;
            opacity: 0;
            transform: translateY(30px);
            box-shadow:
                0 4px 24px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(200, 163, 95, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.03);
        }

        .glass-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
        }

        .glass-card p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            max-width: 440px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Buttons */
        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 2rem;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
            color: #1A1714;
            box-shadow: 0 4px 15px rgba(200, 163, 95, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(200, 163, 95, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-secondary {
            background: rgba(200, 163, 95, 0.08);
            color: var(--gold-light);
            border: 1px solid rgba(200, 163, 95, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(200, 163, 95, 0.15);
            border-color: rgba(200, 163, 95, 0.35);
            transform: translateY(-2px);
        }

        .btn-secondary:active {
            transform: translateY(0);
        }

        .btn svg {
            width: 18px;
            height: 18px;
        }

        /* Footer breadcrumb */
        .footer-hint {
            margin-top: 1.5rem;
            color: var(--text-muted);
            font-size: 0.85rem;
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.4s forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .footer-hint a {
            color: var(--gold);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-hint a:hover {
            color: var(--gold-light);
        }

        .divider-dot {
            display: inline-block;
            width: 4px;
            height: 4px;
            background: var(--text-muted);
            border-radius: 50%;
            vertical-align: middle;
            margin: 0 0.75rem;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .glass-card {
                padding: 1.5rem 1.25rem;
                border-radius: 16px;
            }

            .glass-card h2 {
                font-size: 1.4rem;
            }

            .glass-card p {
                font-size: 0.95rem;
            }

            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
                width: 100%;
                justify-content: center;
            }

            .btn-group {
                flex-direction: column;
            }

            .illustration {
                width: 100px;
                height: 100px;
            }

            .footer-hint .divider-dot {
                display: none;
            }

            .footer-hint {
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
            }
        }
    </style>
</head>

<body>
    <!-- Background effects -->
    <div class="bg-gradient"></div>
    <div class="grid-pattern"></div>
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container-404">
        <!-- Broken chair SVG illustration -->
        <div class="illustration">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <!-- Chair back -->
                <path class="chair-line" d="M60 40 L60 100 L140 100 L140 40" />
                <path class="chair-line chair-line-delayed" d="M60 55 L140 55" />
                <path class="chair-line chair-line-delayed" d="M60 70 L140 70" />
                <path class="chair-line chair-line-delayed" d="M60 85 L140 85" />
                <!-- Chair seat -->
                <path class="chair-line" d="M45 100 L155 100 L150 110 L50 110 Z" />
                <!-- Chair legs - left intact -->
                <path class="chair-line" d="M55 110 L45 170" />
                <!-- Chair legs - right intact -->
                <path class="chair-line" d="M145 110 L155 170" />
                <!-- Chair leg - broken piece -->
                <path class="chair-line" d="M85 110 L80 140" />
                <path class="broken-piece" d="M78 142 L72 165 M78 142 L85 160" />
                <!-- Chair leg - another broken piece -->
                <path class="chair-line" d="M115 110 L120 135" />
                <path class="broken-piece" d="M121 137 L128 162 M121 137 L114 158" />
                <!-- Decorative dots (scattered pieces) -->
                <circle class="broken-piece" cx="75" cy="175" r="2" fill="currentColor"
                    style="stroke:none; fill: var(--gold-light);" />
                <circle class="broken-piece" cx="130" cy="172" r="1.5" fill="currentColor"
                    style="stroke:none; fill: var(--gold-light); animation-delay: 2s;" />
                <circle class="broken-piece" cx="90" cy="178" r="1" fill="currentColor"
                    style="stroke:none; fill: var(--gold-light); animation-delay: 2.2s;" />
            </svg>
        </div>

        <!-- Error code -->
        <div class="error-code">404</div>

        <!-- Glass card content -->
        <div class="glass-card">
            <h2>Halaman Tidak Ditemukan</h2>
            <p>
                Maaf, halaman yang Anda cari tidak tersedia atau mungkin telah dipindahkan.
                Mari kembali dan temukan furniture impian Anda.
            </p>

            <div class="btn-group">
                <a href="{{ url('/') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Kembali ke Beranda
                </a>
                <a href="javascript:history.back()" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Halaman Sebelumnya
                </a>
            </div>
        </div>

        <!-- Footer hint -->
        <div class="footer-hint">
            <span><a href="{{ url('/') }}">{{ config('app.name', 'Arini Furniture') }}</a></span>
            <span class="divider-dot"></span>
            <span>Error 404 &mdash; Page Not Found</span>
        </div>
    </div>
</body>

</html>
