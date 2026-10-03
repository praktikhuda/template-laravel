@props([
    'color' => 'neutral',
    'size' => 'md',
    'dot' => false
])

@php
$colorClasses = match($color) {
    'success' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200/80 dark:border-emerald-800',
    'danger' => 'bg-rose-50 text-rose-700 dark:bg-rose-950/60 dark:text-rose-400 border border-rose-200/80 dark:border-rose-800',
    'warning' => 'bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-400 border border-amber-200/80 dark:border-amber-800',
    'info' => 'bg-sky-50 text-sky-700 dark:bg-sky-950/60 dark:text-sky-400 border border-sky-200/80 dark:border-sky-800',
    'brand' => 'bg-brand-50 text-brand-700 dark:bg-brand-950/60 dark:text-brand-400 border border-brand-200/80 dark:border-brand-800',
    default => 'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700',
};

$dotClasses = match($color) {
    'success' => 'bg-emerald-500',
    'danger' => 'bg-rose-500',
    'warning' => 'bg-amber-500',
    'info' => 'bg-sky-500',
    'brand' => 'bg-brand-500',
    default => 'bg-slate-400',
};

$sizeClasses = match($size) {
    'sm' => 'px-2 py-0.5 text-[10px]',
    'md' => 'px-2.5 py-1 text-xs',
    default => 'px-2.5 py-1 text-xs',
};
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 font-semibold rounded-full $colorClasses $sizeClasses"]) }}>
    @if($dot)
        <span class="w-1.5 h-1.5 rounded-full {{ $dotClasses }}"></span>
    @endif
    {{ $slot }}
</span>
