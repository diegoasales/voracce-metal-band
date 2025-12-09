<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Voracce Metal Band')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0d0d0d 100%);
            color: #e0e0e0;
            min-height: 100vh;
            line-height: 1.6;
        }

        /* Header e Navegação */
        header {
            background: rgba(0, 0, 0, 0.9);
            border-bottom: 2px solid #8b0000;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(139, 0, 0, 0.3);
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: #ff0000;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.5), 0 0 20px rgba(255, 0, 0, 0.3);
            letter-spacing: 3px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #e0e0e0;
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1rem;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #ff0000;
            border-color: #ff0000;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: #ff0000;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-links a:hover::after {
            width: 80%;
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            background: transparent;
            border: 2px solid #ff0000;
            color: #ff0000;
            padding: 0.5rem 1rem;
            cursor: pointer;
            font-size: 1.5rem;
            text-transform: uppercase;
        }

        /* Main Content */
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.9);
            border-top: 2px solid #8b0000;
            padding: 2rem;
            text-align: center;
            margin-top: 4rem;
            color: #888;
        }

        footer p {
            margin: 0.5rem 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                margin-top: 1rem;
                gap: 0.5rem;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links a {
                width: 100%;
                text-align: center;
                padding: 1rem;
            }

            main {
                padding: 2rem 1rem;
            }

            .logo {
                font-size: 1.5rem;
            }
        }

        /* Efeitos de texto metal */
        .metal-text {
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.5), 0 0 20px rgba(255, 0, 0, 0.3);
        }

        /* Animações */
        @keyframes glow {
            0%, 100% {
                text-shadow: 0 0 10px rgba(255, 0, 0, 0.5), 0 0 20px rgba(255, 0, 0, 0.3);
            }
            50% {
                text-shadow: 0 0 20px rgba(255, 0, 0, 0.8), 0 0 30px rgba(255, 0, 0, 0.5);
            }
        }

        .glow-animation {
            animation: glow 2s ease-in-out infinite;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('home') }}" class="logo">Voracce</a>
            <button class="menu-toggle" onclick="toggleMenu()">☰</button>
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('messages.nav.home') }}</a></li>
                <li><a href="{{ route('members') }}" class="{{ request()->routeIs('members') ? 'active' : '' }}">{{ __('messages.nav.members') }}</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('messages.nav.contact') }}</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Voracce. {{ __('messages.footer.rights') }}</p>
        <p>{{ __('messages.footer.influences') }}</p>
    </footer>

    <script>
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }
    </script>
    @stack('scripts')
</body>
</html>

