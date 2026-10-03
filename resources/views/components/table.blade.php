@props([
    'headers' => [],
    'pagination' => null
])

<div class="w-full overflow-hidden border border-slate-200/80 dark:border-night-border rounded-2xl bg-white dark:bg-night-card shadow-xs">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50/80 dark:bg-slate-800/50 border-b border-slate-200/80 dark:border-night-border text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                    @foreach($headers as $header)
                        <th scope="col" class="px-5 py-3.5 whitespace-nowrap {{ is_array($header) ? ($header['class'] ?? '') : '' }}">
                            {{ is_array($header) ? ($header['label'] ?? '') : $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-night-border">
                {{ $slot }}
            </tbody>
        </table>
    </div>

    @if($pagination)
        <div class="px-5 py-3.5 border-t border-slate-100 dark:border-night-border bg-slate-50/40 dark:bg-slate-800/20">
            {{ $pagination }}
        </div>
    @endif
</div>
