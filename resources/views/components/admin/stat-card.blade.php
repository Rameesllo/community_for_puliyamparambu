{{--
    Admin Stat Card Component
    resources/views/components/admin/stat-card.blade.php

    Props:
        $label  — card label text
        $value  — stat value
        $icon   — SVG path(s) string
        $color  — tailwind color key: orange | blue | green | purple
        $trend  — optional: e.g. '+12%'
        $trendUp — bool, true = positive trend
--}}
@props([
    'label'   => 'Stat',
    'value'   => '0',
    'icon'    => '',
    'color'   => 'orange',
    'trend'   => null,
    'trendUp' => true,
])

@php
$colors = [
    'orange' => [
        'bg'     => 'bg-orange-50',
        'border' => 'border-orange-100',
        'icon'   => 'bg-orange-100 text-orange-600',
        'value'  => 'text-orange-600',
    ],
    'blue' => [
        'bg'     => 'bg-blue-50',
        'border' => 'border-blue-100',
        'icon'   => 'bg-blue-100 text-blue-600',
        'value'  => 'text-blue-600',
    ],
    'green' => [
        'bg'     => 'bg-emerald-50',
        'border' => 'border-emerald-100',
        'icon'   => 'bg-emerald-100 text-emerald-600',
        'value'  => 'text-emerald-600',
    ],
    'purple' => [
        'bg'     => 'bg-violet-50',
        'border' => 'border-violet-100',
        'icon'   => 'bg-violet-100 text-violet-600',
        'value'  => 'text-violet-600',
    ],
];
$c = $colors[$color] ?? $colors['orange'];
@endphp

<div class="bg-white rounded-2xl border {{ $c['border'] }} p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
    <div class="flex items-start justify-between gap-3">
        <div class="flex-1 min-w-0">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">{{ $label }}</p>
            <p class="text-3xl font-bold {{ $c['value'] }} leading-none">{{ $value }}</p>
            @if ($trend)
                <div class="flex items-center gap-1 mt-2">
                    <svg class="w-3.5 h-3.5 {{ $trendUp ? 'text-emerald-500' : 'text-red-400' }}"
                         fill="currentColor" viewBox="0 0 20 20">
                        @if ($trendUp)
                            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        @else
                            <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        @endif
                    </svg>
                    <span class="text-xs font-medium {{ $trendUp ? 'text-emerald-600' : 'text-red-500' }}">{{ $trend }}</span>
                    <span class="text-xs text-slate-400">vs last month</span>
                </div>
            @endif
        </div>
        <div class="w-11 h-11 rounded-xl {{ $c['icon'] }} flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        </div>
    </div>
</div>
