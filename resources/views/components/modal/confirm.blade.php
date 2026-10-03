@props([
    'id',
    'title' => 'Konfirmasi Tindakan',
    'message' => 'Apakah Anda yakin ingin melanjutkan tindakan ini?',
    'type' => 'danger', // danger, warning, info
    'confirmText' => 'Ya, Lanjutkan',
    'cancelText' => 'Batal',
    'action' => '#'
])

@php
$iconName = match($type) {
    'danger' => 'alert-circle',
    'warning' => 'alert-triangle',
    'info' => 'info',
    default => 'help-circle'
};

$iconColor = match($type) {
    'danger' => 'bg-rose-100 text-rose-600 dark:bg-rose-950/60 dark:text-rose-400',
    'warning' => 'bg-amber-100 text-amber-600 dark:bg-amber-950/60 dark:text-amber-400',
    'info' => 'bg-sky-100 text-sky-600 dark:bg-sky-950/60 dark:text-sky-400',
    default => 'bg-brand-100 text-brand-600 dark:bg-brand-950/60 dark:text-brand-400'
};

$btnColor = match($type) {
    'danger' => 'bg-rose-600 hover:bg-rose-700 text-white shadow-rose-600/25',
    'warning' => 'bg-amber-500 hover:bg-amber-600 text-white shadow-amber-500/25',
    'info' => 'bg-sky-600 hover:bg-sky-700 text-white shadow-sky-600/25',
    default => 'bg-brand-600 hover:bg-brand-700 text-white shadow-brand-600/25'
};
@endphp

<dialog 
    id="{{ $id }}" 
    class="backdrop:bg-slate-900/60 backdrop:backdrop-blur-xs p-0 rounded-3xl shadow-2xl bg-white dark:bg-night-card border border-slate-200 dark:border-night-border max-w-sm w-full m-auto transition-all"
>
    <div class="p-6 text-center">
        <!-- Close Button (Native Form Dialog) -->
        <form method="dialog" class="absolute right-4 top-4">
            <button class="p-1 rounded-full text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </form>

        <!-- Icon Box -->
        <div class="mx-auto w-14 h-14 rounded-2xl flex items-center justify-center mb-4 {{ $iconColor }}">
            <i data-lucide="{{ $iconName }}" class="w-7 h-7"></i>
        </div>

        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">
            {{ $title }}
        </h3>
        
        <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 leading-relaxed">
            {{ $message }}
        </p>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 justify-center">
            <form method="dialog" class="w-1/2">
                <button class="w-full px-4 py-2.5 rounded-xl text-sm font-semibold border border-slate-300 dark:border-night-border text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                    {{ $cancelText }}
                </button>
            </form>

            <form method="POST" action="{{ $action }}" class="w-1/2">
                @csrf
                <button type="submit" class="w-full px-4 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition {{ $btnColor }}">
                    {{ $confirmText }}
                </button>
            </form>
        </div>
    </div>
</dialog>
