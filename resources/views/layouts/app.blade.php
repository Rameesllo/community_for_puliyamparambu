<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $metaDescription ?? 'Puliyamparambu Youth Community — Empowering the next generation of leaders through education, culture, and service.' }}" />
    <title>{{ $title ?? 'Puliyamparambu Youth Community' }}</title>

    <!-- Favicon — transparent background -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16.png') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-800 font-sans antialiased">

    <!-- ===== NAVBAR ===== -->
    <nav id="navbar" class="navbar-glass fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- Logo / Brand — transparent SVG -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.svg') }}" alt="Puliyamparambu Youth Community logo" width="40" height="40" class="w-10 h-10 object-contain group-hover:scale-105 transition-transform drop-shadow-lg" onerror="this.onerror=null;this.src='{{ asset('images/logo.png') }}'" />
                    <div class="hidden sm:block">
                        <div class="text-white font-bold text-sm leading-tight">Puliyamparambu</div>
                        <div class="text-blue-300 text-xs leading-tight">Youth Community</div>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <div class="hidden md:flex items-center gap-1">
                    @php
                        $navLinks = [
                            ['route' => 'home',   'label' => 'Home'],
                            ['route' => 'events', 'label' => 'Events'],
                            ['route' => 'team',   'label' => 'Team'],
                            ['route' => 'about',  'label' => 'About'],
                        ];
                    @endphp

                    @foreach ($navLinks as $link)
                        <a href="{{ route($link['route']) }}"
                           class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 relative
                                  {{ request()->routeIs($link['route']) 
                                     ? 'text-blue-400 bg-white/10' 
                                     : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach

                    <a href="{{ route('admin.login') }}"
                       class="ml-3 px-5 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white text-sm font-semibold hover:from-blue-600 hover:to-blue-800 shadow-lg hover:shadow-blue-500/25 transition-all duration-200 hover:-translate-y-0.5">
                        Admin
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn"
                        class="md:hidden text-slate-300 hover:text-white p-2 rounded-lg hover:bg-white/10 transition-colors"
                        aria-label="Toggle navigation menu"
                        aria-expanded="false">
                    <svg id="menu-icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="menu-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden border-t border-white/10">
            <div class="px-4 pt-3 pb-4 space-y-1">
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors
                              {{ request()->routeIs($link['route'])
                                 ? 'text-blue-400 bg-white/10'
                                 : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('admin.login') }}"
                   class="block mt-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white text-sm font-semibold text-center">
                    Admin Login
                </a>
            </div>
        </div>
    </nav>

    <!-- ===== PAGE CONTENT ===== -->
    <main>
        {{ $slot }}
    </main>

    <!-- ===== JS ===== -->
    <script>
        // Mobile menu toggle
        const btn  = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconOpen  = document.getElementById('menu-icon-open');
        const iconClose = document.getElementById('menu-icon-close');

        btn.addEventListener('click', () => {
            const isOpen = menu.classList.toggle('open');
            btn.setAttribute('aria-expanded', isOpen);
            iconOpen.classList.toggle('hidden', isOpen);
            iconClose.classList.toggle('hidden', !isOpen);
        });

        // Close mobile menu on link click
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.remove('open');
                btn.setAttribute('aria-expanded', 'false');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            });
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.style.background = 'rgba(15, 23, 42, 0.97)';
            } else {
                navbar.style.background = 'rgba(15, 23, 42, 0.9)';
            }
        });
    </script>
</body>
</html>
