@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
])

@php
$baseClasses = 'inline-flex items-center justify-center font-semibold rounded-xl transition duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';

$variantClasses = match($variant) {
    'primary' => 'bg-brand-600 hover:bg-brand-700 text-white shadow-sm shadow-brand-600/25 focus:ring-brand-500',
    'secondary' => 'bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 focus:ring-slate-400',
    'danger' => 'bg-rose-600 hover:bg-rose-700 text-white shadow-sm shadow-rose-600/25 focus:ring-rose-500',
    'warning' => 'bg-amber-500 hover:bg-amber-600 text-white shadow-sm shadow-amber-500/25 focus:ring-amber-400',
    'outline' => 'border border-slate-300 dark:border-night-border text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800 focus:ring-brand-500',
    'ghost' => 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 focus:ring-slate-400',
    default => 'bg-brand-600 hover:bg-brand-700 text-white focus:ring-brand-500',
};

$sizeClasses = match($size) {
    'sm' => 'px-3 py-1.5 text-xs gap-1.5',
    'md' => 'px-4 py-2.5 text-sm gap-2',
    'lg' => 'px-5 py-3 text-base gap-2.5',
    default => 'px-4 py-2.5 text-sm gap-2',
};
@endphp

<button {{ $attributes->merge(['class' => "$baseClasses $variantClasses $sizeClasses"]) }}>
    @if($icon)
        <i data-lucide="{{ $icon }}" class="w-4 h-4 shrink-0"></i>
    @endif
    {{ $slot }}
</button>
