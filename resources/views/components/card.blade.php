@props([
    'title' => null,
    'subtitle' => null,
    'action' => null
])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-night-card border border-slate-200/80 dark:border-night-border rounded-2xl shadow-xs overflow-hidden transition-all duration-200']) }}>
    @if($title || $subtitle || $action)
        <div class="px-6 py-4.5 border-b border-slate-100 dark:border-night-border flex items-center justify-between">
            <div>
                @if($title)
                    <h3 class="text-base font-bold text-slate-900 dark:text-white tracking-tight">{{ $title }}</h3>
                @endif
                @if($subtitle)
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $subtitle }}</p>
                @endif
            </div>
            @if($action)
                <div>{{ $action }}</div>
            @endif
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>
</div>
