<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Admin Portal — Puliyamparambu Youth Community" />
    <title>Admin Login — Puliyamparambu Youth Community</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌟</text></svg>" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-login-bg min-h-screen flex flex-col items-center justify-center p-4 relative overflow-hidden font-sans antialiased">

    {{-- Decorative blobs --}}
    <div class="absolute top-0 left-0 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl pointer-events-none -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-600/8 rounded-full blur-3xl pointer-events-none translate-x-1/3 translate-y-1/3"></div>
    <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-slate-700/30 rounded-full blur-3xl pointer-events-none"></div>

    {{-- Back to site --}}
    <div class="absolute top-5 left-5 z-20">
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-2 text-slate-400 hover:text-white text-sm transition-colors group">
            <svg class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Site
        </a>
    </div>

    {{-- Login card --}}
    <div class="w-full max-w-md relative z-10">
        <div class="bg-slate-800/70 backdrop-blur-xl border border-slate-700/60 rounded-3xl p-8 shadow-2xl shadow-black/40">

            {{-- Branding --}}
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4 shadow-xl shadow-orange-500/30">
                    P
                </div>
                <div class="inline-flex items-center gap-2 bg-orange-500/15 border border-orange-400/25 rounded-full px-3 py-1 mb-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-orange-400 animate-pulse"></span>
                    <span class="text-orange-400 text-xs font-medium tracking-wider uppercase">Admin Portal</span>
                </div>
                <h1 class="text-2xl font-bold text-white">Welcome Back</h1>
                <p class="text-slate-400 text-sm mt-1">Puliyamparambu Youth Community</p>
            </div>

            {{-- Session status (e.g. logged out message) --}}
            @if (session('status'))
                <div class="bg-emerald-500/10 border border-emerald-400/25 rounded-xl px-4 py-3 mb-5 flex items-center gap-2" role="status">
                    <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-emerald-300 text-sm">{{ session('status') }}</p>
                </div>
            @endif

            {{-- Authentication error --}}
            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-400/25 rounded-xl px-4 py-3 mb-5 flex items-start gap-2" role="alert">
                    <svg class="w-4 h-4 text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-red-300 text-sm">{{ $errors->first('email') }}</p>
                </div>
            @endif

            {{-- Login form — POSTs to the real auth route --}}
            <form action="{{ route('admin.login.submit') }}" method="POST" id="admin-login-form" novalidate class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-300 mb-1.5">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="admin@puliyamparambu.org"
                            autocomplete="email"
                            class="admin-input w-full pl-10 pr-4 py-3 rounded-xl text-sm {{ $errors->has('email') ? 'admin-input-error' : '' }}"
                            required
                            autofocus
                        />
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-300 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            autocomplete="current-password"
                            class="admin-input w-full pl-10 pr-12 py-3 rounded-xl text-sm {{ $errors->has('email') ? 'admin-input-error' : '' }}"
                            required
                        />
                        <button
                            type="button"
                            id="toggle-password"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-500 hover:text-slate-300 transition-colors"
                            aria-label="Toggle password visibility">
                            <svg id="eye-open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg id="eye-closed" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Remember me / Forgot --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="w-4 h-4 rounded border-slate-600 bg-slate-700 text-orange-500 focus:ring-orange-500 focus:ring-offset-0"
                            {{ old('remember') ? 'checked' : '' }}
                        />
                        <span class="text-sm text-slate-400">Remember me</span>
                    </label>
                    {{-- Forgot password — UI only; Phase 4+ --}}
                    <span class="text-sm text-slate-500 cursor-not-allowed" title="Available in a future phase">
                        Forgot password?
                    </span>
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    id="login-btn"
                    class="admin-btn-primary w-full py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-slate-900 flex items-center justify-center gap-2">
                    Sign In to Admin Panel
                </button>
            </form>
        </div>

        <p class="text-center text-slate-600 text-xs mt-6">
            &copy; {{ date('Y') }} Puliyamparambu Youth Community. For authorized personnel only.
        </p>
    </div>

    <script>
        // Show/hide password
        const toggleBtn = document.getElementById('toggle-password');
        const pwdInput  = document.getElementById('password');
        const eyeOpen   = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        toggleBtn.addEventListener('click', () => {
            const isPassword = pwdInput.type === 'password';
            pwdInput.type    = isPassword ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', isPassword);
            eyeClosed.classList.toggle('hidden', !isPassword);
        });
    </script>
</body>
</html>
