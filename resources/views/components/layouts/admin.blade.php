{{--
    Admin Layout Component — components/layouts/admin.blade.php
    Used as: <x-layouts.admin :pageTitle="'Dashboard'">

    TODO (Phase 3+): Add auth middleware to protect all admin routes.
--}}
@props(['pageTitle' => 'Dashboard', 'title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Admin Dashboard — Puliyamparambu Youth Community" />
    <title>{{ $title }} — Puliyamparambu Youth Community Admin</title>
    <!-- Favicon — transparent background -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16.png') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-100 font-sans antialiased">

    {{-- Mobile sidebar backdrop --}}
    <div id="sidebar-backdrop"
         class="fixed inset-0 bg-black/50 backdrop-blur-sm z-30 lg:hidden hidden"
         aria-hidden="true"></div>

    <div class="flex min-h-screen">

        {{-- ===== SIDEBAR ===== --}}
        <x-admin.sidebar />

        {{-- ===== MAIN COLUMN ===== --}}
        <div class="flex-1 flex flex-col min-w-0 lg:ml-64">

            {{-- ===== TOPBAR ===== --}}
            <x-admin.topbar :pageTitle="$pageTitle" />

            {{-- ===== PAGE CONTENT ===== --}}
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>

            {{-- ===== FOOTER ===== --}}
            <footer class="px-6 py-4 border-t border-slate-200 bg-white">
                <p class="text-xs text-slate-400 text-center">
                    &copy; {{ date('Y') }} Puliyamparambu Youth Community — Admin Portal
                </p>
            </footer>
        </div>
    </div>

    <script>
        // ── Mobile sidebar toggle ───────────────────────────────────
        const sidebarEl = document.getElementById('admin-sidebar');
        const backdrop  = document.getElementById('sidebar-backdrop');
        const openBtn   = document.getElementById('sidebar-open-btn');
        const closeBtn  = document.getElementById('sidebar-close-btn');

        function openSidebar() {
            sidebarEl.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeSidebar() {
            sidebarEl.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
            document.body.style.overflow = '';
        }

        openBtn  && openBtn.addEventListener('click', openSidebar);
        closeBtn && closeBtn.addEventListener('click', closeSidebar);
        backdrop && backdrop.addEventListener('click', closeSidebar);

        // ── Profile dropdown ────────────────────────────────────────
        const profileBtn      = document.getElementById('profile-menu-btn');
        const profileDropdown = document.getElementById('profile-dropdown');

        if (profileBtn && profileDropdown) {
            profileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });
            document.addEventListener('click', () => profileDropdown.classList.add('hidden'));
        }

        // ── Notification dropdown ───────────────────────────────────
        const notifBtn      = document.getElementById('notif-btn');
        const notifDropdown = document.getElementById('notif-dropdown');

        if (notifBtn && notifDropdown) {
            notifBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                notifDropdown.classList.toggle('hidden');
            });
            document.addEventListener('click', () => notifDropdown.classList.add('hidden'));
        }
    </script>
</body>
</html>
