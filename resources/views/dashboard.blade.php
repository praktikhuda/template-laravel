<x-layouts.app title="Dashboard Keuangan" subtitle="Pantau arus kas multi-wallet, rekonsiliasi saldo, dan transaksi terkini.">

    <!-- TOP SECTION: HEADER ACTIONS & FILTERS -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Halo, Samsul Pheee 👋
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                Berikut ringkasan kesehatan finansial dompet Anda per hari ini, {{ date('d F Y') }}.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button variant="outline" size="sm" icon="calendar">
                Oktober 2026
            </x-button>

            <x-button variant="primary" size="sm" icon="plus" onclick="alert('Form Transaksi Baru Siap Dibuka!')">
                Catat Transaksi
            </x-button>
        </div>
    </div>

    <!-- 4 STAT / KPI CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Saldo Total -->
        <div class="bg-white dark:bg-night-card border border-slate-200/80 dark:border-night-border rounded-2xl p-5 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Total Saldo</span>
                <div class="mt-1 text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    Rp 38.450.000
                </div>
                <div class="mt-1.5 flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                    <i data-lucide="trending-up" class="w-3.5 h-3.5"></i>
                    <span>+4.2% dari bulan lalu</span>
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center">
                <i data-lucide="wallet-cards" class="w-6 h-6"></i>
            </div>
        </div>

        <!-- Pemasukan -->
        <div class="bg-white dark:bg-night-card border border-slate-200/80 dark:border-night-border rounded-2xl p-5 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Pemasukan Bulan Ini</span>
                <div class="mt-1 text-2xl font-black text-emerald-600 dark:text-emerald-400 tracking-tight">
                    Rp 15.200.000
                </div>
                <div class="mt-1.5 text-xs text-slate-400 dark:text-slate-500">
                    Gaji & Hasil Freelance
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                <i data-lucide="arrow-down-left" class="w-6 h-6"></i>
            </div>
        </div>

        <!-- Pengeluaran -->
        <div class="bg-white dark:bg-night-card border border-slate-200/80 dark:border-night-border rounded-2xl p-5 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Pengeluaran Bulan Ini</span>
                <div class="mt-1 text-2xl font-black text-rose-600 dark:text-rose-400 tracking-tight">
                    Rp 6.840.000
                </div>
                <div class="mt-1.5 text-xs text-slate-400 dark:text-slate-500">
                    44.9% dari total alokasi
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-rose-50 dark:bg-rose-950/50 text-rose-600 dark:text-rose-400 flex items-center justify-center">
                <i data-lucide="arrow-up-right" class="w-6 h-6"></i>
            </div>
        </div>

        <!-- Selisih Rekonsiliasi -->
        <div class="bg-white dark:bg-night-card border border-slate-200/80 dark:border-night-border rounded-2xl p-5 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Status Rekonsiliasi</span>
                <div class="mt-1 text-2xl font-black text-slate-900 dark:text-white tracking-tight flex items-center gap-2">
                    Rp 0
                    <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-700 dark:bg-emerald-900/60 dark:text-emerald-300">Presisi</span>
                </div>
                <div class="mt-1.5 text-xs text-slate-400 dark:text-slate-500">
                    5/5 Dompet Cocok Fisik
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                <i data-lucide="check-check" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <!-- WALLET SUMMARY GRID & RECENT TRANSACTIONS -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- MULTI-WALLET OVERVIEW (1 Kolom) -->
        <div class="lg:col-span-1">
            <x-card title="Dompet & Bank Aktif" subtitle="Saldo tersimpan di tiap akun">
                <x-slot:action>
                    <a href="#" class="text-xs font-bold text-brand-600 hover:text-brand-700 dark:text-brand-400">Kelola &rarr;</a>
                </x-slot:action>

                <div class="space-y-3.5">
                    <!-- Bank BSI -->
                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-night-border">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-teal-500/15 text-teal-600 dark:text-teal-400 flex items-center justify-center font-black text-xs">
                                BSI
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white">Bank Syariah Indonesia</h4>
                                <span class="text-[11px] text-slate-400">Rekening Utama</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-black text-slate-900 dark:text-white">Rp 24.150.000</div>
                            <span class="text-[10px] text-emerald-600 font-semibold">Tersinkron</span>
                        </div>
                    </div>

                    <!-- Bank Jago -->
                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-night-border">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-500/15 text-amber-600 dark:text-amber-400 flex items-center justify-center font-black text-xs">
                                JAGO
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white">Bank Jago (Kantong)</h4>
                                <span class="text-[11px] text-slate-400">Operasional</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-black text-slate-900 dark:text-white">Rp 8.500.000</div>
                            <span class="text-[10px] text-emerald-600 font-semibold">Tersinkron</span>
                        </div>
                    </div>

                    <!-- ShopeePay -->
                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-night-border">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-orange-500/15 text-orange-600 dark:text-orange-400 flex items-center justify-center font-black text-xs">
                                SPAY
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white">ShopeePay</h4>
                                <span class="text-[11px] text-slate-400">E-Wallet Jajan</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-black text-slate-900 dark:text-white">Rp 1.850.000</div>
                            <span class="text-[10px] text-emerald-600 font-semibold">Tersinkron</span>
                        </div>
                    </div>

                    <!-- Cash / Dompet Fisik -->
                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-night-border">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-black text-xs">
                                CASH
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white">Uang Tunai (Cash)</h4>
                                <span class="text-[11px] text-slate-400">Dompet Fisik</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-black text-slate-900 dark:text-white">Rp 3.950.000</div>
                            <span class="text-[10px] text-emerald-600 font-semibold">Tersinkron</span>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- RECENT TRANSACTIONS TABLE (2 Kolom) -->
        <div class="lg:col-span-2">
            <x-card title="Transaksi Terakhir" subtitle="Aktivitas pengeluaran dan pemasukan 7 hari terakhir">
                <x-slot:action>
                    <x-button variant="ghost" size="sm" icon="sliders-horizontal">Filter</x-button>
                </x-slot:action>

                <x-table :headers="[
                    ['label' => 'Tanggal & Waktu', 'class' => 'text-left'],
                    ['label' => 'Kategori & Keterangan', 'class' => 'text-left'],
                    ['label' => 'Akun', 'class' => 'text-left'],
                    ['label' => 'Nominal', 'class' => 'text-right'],
                    ['label' => 'Status', 'class' => 'text-center'],
                    ['label' => 'Aksi', 'class' => 'text-center'],
                ]">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/40 transition">
                        <td class="px-5 py-3.5 whitespace-nowrap text-xs text-slate-500 dark:text-slate-400">
                            03 Okt 2026, 14:30
                        </td>
                        <td class="px-5 py-3.5">
                            <div class="font-bold text-slate-900 dark:text-white text-xs">Project Freelance Laravel</div>
                            <div class="text-[11px] text-slate-400">Pendapatan Jasa</div>
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-xs font-medium text-slate-700 dark:text-slate-300">
                            Bank BSI
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-right font-black text-emerald-600 dark:text-emerald-400 text-xs">
                            +Rp 4.500.000
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-center">
                            <x-badge color="success" dot="true">Lunas</x-badge>
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-center">
                            <button 
                                onclick="document.getElementById('confirmDeleteModal').showModal()"
                                class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/50 transition"
                                title="Hapus Transaksi"
                            >
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/40 transition">
                        <td class="px-5 py-3.5 whitespace-nowrap text-xs text-slate-500 dark:text-slate-400">
                            02 Okt 2026, 19:15
                        </td>
                        <td class="px-5 py-3.5">
                            <div class="font-bold text-slate-900 dark:text-white text-xs">Belanja Mingguan Supermarket</div>
                            <div class="text-[11px] text-slate-400">Kebutuhan Rumah</div>
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-xs font-medium text-slate-700 dark:text-slate-300">
                            ShopeePay
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-right font-black text-rose-600 dark:text-rose-400 text-xs">
                            -Rp 420.000
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-center">
                            <x-badge color="brand" dot="true">Struk Ada</x-badge>
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-center">
                            <button 
                                onclick="document.getElementById('confirmDeleteModal').showModal()"
                                class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/50 transition"
                                title="Hapus Transaksi"
                            >
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/40 transition">
                        <td class="px-5 py-3.5 whitespace-nowrap text-xs text-slate-500 dark:text-slate-400">
                            01 Okt 2026, 09:00
                        </td>
                        <td class="px-5 py-3.5">
                            <div class="font-bold text-slate-900 dark:text-white text-xs">Langganan VPS Server</div>
                            <div class="text-[11px] text-slate-400">Server & IT</div>
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-xs font-medium text-slate-700 dark:text-slate-300">
                            Bank Jago
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-right font-black text-rose-600 dark:text-rose-400 text-xs">
                            -Rp 250.000
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-center">
                            <x-badge color="info" dot="true">Rutin</x-badge>
                        </td>
                        <td class="px-5 py-3.5 whitespace-nowrap text-center">
                            <button 
                                onclick="document.getElementById('confirmDeleteModal').showModal()"
                                class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/50 transition"
                                title="Hapus Transaksi"
                            >
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>
                </x-table>
            </x-card>
        </div>
    </div>

    <!-- MODAL KONFIRMASI NATIVE (DEMONSTRASI KOMPONEN) -->
    <x-modal.confirm 
        id="confirmDeleteModal"
        title="Hapus Catatan Transaksi?"
        message="Data transaksi ini akan dihapus secara permanen dari sistem dan saldo dompet akan dikalkulasi ulang."
        type="danger"
        confirmText="Hapus Sekarang"
        cancelText="Batalkan"
        action="#"
    />

</x-layouts.app>
