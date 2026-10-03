<!DOCTYPE html>
<html lang="en" class="h-full bg-[#f8f9fa]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Management · Uxerflow Inc.</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            orange: '#f95738',
                            orangeHover: '#ea4a2a',
                            dark: '#111827',
                            muted: '#6b7280',
                            border: '#e5e7eb',
                            canvas: '#f8f9fa',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #9ca3af; }
    </style>
</head>

<body class="h-full text-slate-800 antialiased font-sans flex overflow-hidden" 
      x-data="productDashboard()" 
      x-init="$nextTick(() => { lucide.createIcons(); })">

    <!-- ==================== SIDEBAR KIRI ==================== -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col shrink-0 h-full transition-all duration-300 select-none z-30"
           :class="sidebarOpen ? 'w-64' : 'w-20'">
        
        <!-- Workspace Header -->
        <div class="h-16 px-4 flex items-center justify-between border-b border-gray-100">
            <div class="flex items-center gap-3 overflow-hidden">
                <div class="w-9 h-9 rounded-xl bg-gray-900 text-white flex items-center justify-center font-bold text-base shrink-0 shadow-sm">
                    w.
                </div>
                <div class="truncate" x-show="sidebarOpen" x-transition.opacity>
                    <div class="flex items-center gap-1.5">
                        <span class="font-bold text-sm text-gray-900">Uxerflow Inc.</span>
                        <i data-lucide="check-circle" class="w-3.5 h-3.5 text-blue-500 fill-blue-50"></i>
                    </div>
                    <span class="inline-block text-[11px] font-medium text-gray-500 bg-gray-100 px-1.5 py-0.5 rounded mt-0.5">Free Plan</span>
                </div>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" 
                    class="w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-gray-700 flex items-center justify-center transition">
                <i data-lucide="chevrons-left" class="w-4 h-4 transition-transform duration-300" :class="!sidebarOpen && 'rotate-180'"></i>
            </button>
        </div>

        <!-- Search Bar -->
        <div class="px-3 pt-3 pb-2" x-show="sidebarOpen" x-transition.opacity>
            <div class="relative">
                <i data-lucide="search" class="w-4 h-4 absolute left-3 top-2.5 text-gray-400"></i>
                <input type="text" 
                       placeholder="Search anything..." 
                       class="w-full pl-9 pr-12 py-1.5 text-xs bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-brand-orange focus:bg-white transition" />
                <span class="absolute right-2.5 top-2 text-[10px] font-semibold text-gray-400 border border-gray-200 bg-white px-1.5 py-0.5 rounded shadow-2xs">⌘K</span>
            </div>
        </div>

        <!-- Navigation Menus -->
        <div class="flex-1 overflow-y-auto px-3 py-2 space-y-5">
            <!-- MAIN MENU -->
            <div>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider px-3" x-show="sidebarOpen">Main Menu</span>
                <nav class="mt-1.5 space-y-0.5">
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <i data-lucide="layout-grid" class="w-4 h-4 shrink-0 text-gray-400"></i>
                        <span x-show="sidebarOpen">Dashboard</span>
                    </a>
                    <!-- Active Menu: Product -->
                    <a href="#" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-brand-orange bg-orange-50/80 border-l-4 border-brand-orange transition">
                        <div class="flex items-center gap-3">
                            <i data-lucide="package" class="w-4 h-4 shrink-0 text-brand-orange"></i>
                            <span x-show="sidebarOpen">Product</span>
                        </div>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <i data-lucide="shopping-bag" class="w-4 h-4 shrink-0 text-gray-400"></i>
                        <span x-show="sidebarOpen">Order</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <i data-lucide="users" class="w-4 h-4 shrink-0 text-gray-400"></i>
                        <span x-show="sidebarOpen">Customer</span>
                    </a>
                    <a href="#" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <div class="flex items-center gap-3">
                            <i data-lucide="message-square" class="w-4 h-4 shrink-0 text-gray-400"></i>
                            <span x-show="sidebarOpen">Message</span>
                        </div>
                        <span x-show="sidebarOpen" class="text-[10px] font-bold bg-orange-500 text-white px-1.5 py-0.2 rounded-full">33</span>
                    </a>
                </nav>
            </div>

            <!-- TOOLS -->
            <div>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider px-3" x-show="sidebarOpen">Tools</span>
                <nav class="mt-1.5 space-y-0.5">
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <i data-lucide="mail" class="w-4 h-4 shrink-0 text-gray-400"></i>
                        <span x-show="sidebarOpen">Email</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <i data-lucide="zap" class="w-4 h-4 shrink-0 text-gray-400"></i>
                        <span x-show="sidebarOpen">Automation</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <i data-lucide="bar-chart-2" class="w-4 h-4 shrink-0 text-gray-400"></i>
                        <span x-show="sidebarOpen">Analytics</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <i data-lucide="layers" class="w-4 h-4 shrink-0 text-gray-400"></i>
                        <span x-show="sidebarOpen">Integration</span>
                    </a>
                </nav>
            </div>

            <!-- WORKSPACE -->
            <div>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider px-3" x-show="sidebarOpen">Workspace</span>
                <nav class="mt-1.5 space-y-0.5">
                    <a href="#" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-blue-500 shrink-0"></span>
                            <span x-show="sidebarOpen">Campaign</span>
                        </div>
                        <span x-show="sidebarOpen" class="text-[10px] font-semibold text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">5</span>
                    </a>
                    <a href="#" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-pink-500 shrink-0"></span>
                            <span x-show="sidebarOpen">Product Plan</span>
                        </div>
                        <span x-show="sidebarOpen" class="text-[10px] font-semibold text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">4</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Sidebar Footer & Upgrade Promo -->
        <div class="p-3 border-t border-gray-100 space-y-2">
            <!-- Promo Box -->
            <div x-show="sidebarOpen" class="bg-gradient-to-br from-orange-50 to-amber-50/50 border border-orange-200/60 p-3 rounded-2xl relative overflow-hidden">
                <div class="flex items-center gap-2 mb-1.5">
                    <div class="w-6 h-6 rounded-lg bg-brand-orange text-white flex items-center justify-center shrink-0 shadow-xs">
                        <i data-lucide="rocket" class="w-3.5 h-3.5"></i>
                    </div>
                    <span class="text-xs font-bold text-gray-900">Upgrade Plan</span>
                </div>
                <p class="text-[11px] text-gray-600 leading-snug">Unlock unlimited automation and premium analytics.</p>
                <button class="mt-2.5 w-full py-1.5 text-xs font-semibold bg-gray-900 hover:bg-black text-white rounded-xl shadow-xs transition">Upgrade Now</button>
            </div>

            <!-- Utility Links -->
            <nav class="space-y-0.5 pt-1">
                <a href="#" class="flex items-center gap-3 px-3 py-1.5 rounded-lg text-xs font-medium text-gray-500 hover:text-gray-800 transition">
                    <i data-lucide="help-circle" class="w-4 h-4 shrink-0"></i>
                    <span x-show="sidebarOpen">Help Center</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-1.5 rounded-lg text-xs font-medium text-gray-500 hover:text-gray-800 transition">
                    <i data-lucide="settings" class="w-4 h-4 shrink-0"></i>
                    <span x-show="sidebarOpen">Settings</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- ==================== MAIN CONTENT CANVAS ==================== -->
    <main class="flex-1 flex flex-col h-full overflow-hidden bg-[#f8f9fa]">
        
        <!-- Topbar Header -->
        <header class="h-16 px-8 bg-white border-b border-gray-200/80 flex items-center justify-between shrink-0">
            <div>
                <h1 class="text-xl font-bold text-gray-900 tracking-tight">Product</h1>
                <p class="text-xs text-gray-500 hidden sm:block">Manage your catalog, stock allocations, and realtime sales metrics.</p>
            </div>

            <div class="flex items-center gap-3">
                <!-- User Avatar Stack -->
                <div class="flex items-center -space-x-2 mr-2">
                    <div class="w-8 h-8 rounded-full bg-indigo-600 text-white font-bold text-xs flex items-center justify-center ring-2 ring-white">JI</div>
                    <div class="w-8 h-8 rounded-full bg-emerald-600 text-white font-bold text-xs flex items-center justify-center ring-2 ring-white">SP</div>
                    <div class="w-8 h-8 rounded-full bg-amber-500 text-white font-bold text-xs flex items-center justify-center ring-2 ring-white">+3</div>
                    <button class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 flex items-center justify-center ring-2 ring-white ml-2 transition">
                        <i data-lucide="plus" class="w-3.5 h-3.5"></i>
                    </button>
                </div>

                <!-- Notification Bell -->
                <button class="w-9 h-9 rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-600 flex items-center justify-center relative transition">
                    <i data-lucide="bell" class="w-4 h-4"></i>
                    <span class="w-2 h-2 rounded-full bg-brand-orange absolute top-2 right-2 ring-2 ring-white"></span>
                </button>

                <!-- Customize Widget Button -->
                <button class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 hover:bg-gray-50 transition">
                    <i data-lucide="layout-template" class="w-3.5 h-3.5 text-gray-400"></i>
                    <span>Customize Widget</span>
                </button>
            </div>
        </header>

        <!-- Body Canvas Scrollable -->
        <div class="flex-1 overflow-y-auto p-6 md:p-8 space-y-6 relative">

            <!-- Sub-Toolbar Actions & Filters -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 bg-white p-3.5 rounded-2xl border border-gray-200/80 shadow-2xs">
                <!-- Kiri: View Selector & Filters -->
                <div class="flex flex-wrap items-center gap-2.5">
                    <button class="flex items-center gap-2 px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-semibold text-gray-800 bg-white hover:bg-gray-50 shadow-2xs transition">
                        <i data-lucide="table" class="w-3.5 h-3.5 text-brand-orange"></i>
                        <span>Table View</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-gray-400"></i>
                    </button>

                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-medium text-gray-600 hover:bg-gray-50 transition">
                        <i data-lucide="filter" class="w-3.5 h-3.5 text-gray-400"></i>
                        <span>Filter</span>
                    </button>

                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-medium text-gray-600 hover:bg-gray-50 transition">
                        <i data-lucide="arrow-up-down" class="w-3.5 h-3.5 text-gray-400"></i>
                        <span>Sort</span>
                    </button>

                    <!-- Toggle Show Statistics -->
                    <label class="flex items-center gap-2.5 ml-2 cursor-pointer select-none">
                        <span class="text-xs font-medium text-gray-600">Show Statistics</span>
                        <div class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" x-model="showStatistics" class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand-orange"></div>
                        </div>
                    </label>
                </div>

                <!-- Kanan: Export & CTA -->
                <div class="flex items-center gap-2 w-full lg:w-auto justify-end">
                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-medium text-gray-600 hover:bg-gray-50 transition">
                        <i data-lucide="sliders-horizontal" class="w-3.5 h-3.5 text-gray-400"></i>
                        <span class="hidden sm:inline">Customize</span>
                    </button>

                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-medium text-gray-600 hover:bg-gray-50 transition">
                        <i data-lucide="download" class="w-3.5 h-3.5 text-gray-400"></i>
                        <span>Export</span>
                    </button>

                    <button class="flex items-center gap-1.5 px-4 py-1.5 rounded-xl bg-gray-900 hover:bg-black text-white text-xs font-semibold shadow-xs transition active:scale-95">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        <span>Add New Product</span>
                    </button>
                </div>
            </div>

            <!-- KPI Metric Cards (Grid 4 Kolom) -->
            <div x-show="showStatistics" x-transition.duration.300ms class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <template x-for="(metric, idx) in metrics" :key="idx">
                    <div class="bg-white border border-gray-200/80 p-5 rounded-2xl shadow-2xs hover:shadow-xs transition">
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-2">
                            <span class="font-medium" x-text="metric.title"></span>
                            <i data-lucide="info" class="w-3.5 h-3.5 text-gray-300 hover:text-gray-500 cursor-pointer"></i>
                        </div>
                        <div class="text-2xl font-extrabold text-gray-900 tracking-tight mb-2.5" x-text="metric.value"></div>
                        <div class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full">
                            <span>vs last month</span>
                            <span x-text="metric.change"></span>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Interactive Data Table Container -->
            <div class="bg-white border border-gray-200/80 rounded-2xl shadow-2xs overflow-hidden relative">
                
                <!-- Table Scroll Area -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50/50 text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                                <th class="py-3 px-4 w-10 text-center">
                                    <input type="checkbox" 
                                           :checked="isAllSelected" 
                                           @change="toggleSelectAll" 
                                           class="w-4 h-4 text-brand-orange bg-gray-100 border-gray-300 rounded focus:ring-brand-orange cursor-pointer">
                                </th>
                                <th class="py-3.5 px-4 font-bold text-gray-700">Product</th>
                                <th class="py-3.5 px-4 text-right">Price</th>
                                <th class="py-3.5 px-4 text-right">Sales</th>
                                <th class="py-3.5 px-4 text-right">Revenue</th>
                                <th class="py-3.5 px-4 text-right">Stock</th>
                                <th class="py-3.5 px-4 text-center">Status</th>
                                <th class="py-3.5 px-4 text-center">Rating</th>
                                <th class="py-3.5 px-3 w-8 text-center">
                                    <button class="text-gray-400 hover:text-gray-600"><i data-lucide="plus" class="w-3.5 h-3.5"></i></button>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 text-xs">
                            <template x-for="item in products" :key="item.id">
                                <tr class="transition-colors duration-150"
                                    :class="isSelected(item.id) ? 'bg-orange-50/40' : 'hover:bg-gray-50/70'">
                                    
                                    <!-- Checkbox -->
                                    <td class="py-3.5 px-4 text-center">
                                        <input type="checkbox" 
                                               :checked="isSelected(item.id)" 
                                               @change="toggleSelect(item.id)" 
                                               class="w-4 h-4 text-brand-orange bg-white border-gray-300 rounded focus:ring-brand-orange cursor-pointer">
                                    </td>

                                    <!-- Product Name & Thumbnail -->
                                    <td class="py-3.5 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0 text-gray-500 font-bold text-xs"
                                                 x-text="item.name.charAt(0)">
                                            </div>
                                            <span class="font-semibold text-gray-900 hover:text-brand-orange cursor-pointer transition" x-text="item.name"></span>
                                        </div>
                                    </td>

                                    <!-- Price -->
                                    <td class="py-3.5 px-4 text-right font-medium text-gray-700" x-text="'$' + item.price.toFixed(2)"></td>

                                    <!-- Sales -->
                                    <td class="py-3.5 px-4 text-right font-medium text-gray-600" x-text="item.sales.toLocaleString()"></td>

                                    <!-- Revenue -->
                                    <td class="py-3.5 px-4 text-right font-bold text-gray-900" x-text="'$' + item.revenue.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})"></td>

                                    <!-- Stock -->
                                    <td class="py-3.5 px-4 text-right font-medium" 
                                        :class="item.stock === 0 ? 'text-red-500 font-bold' : 'text-gray-700'"
                                        x-text="item.stock"></td>

                                    <!-- Status Badge -->
                                    <td class="py-3.5 px-4 text-center">
                                        <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold border"
                                              :class="{
                                                'bg-indigo-50 text-indigo-700 border-indigo-200': item.status === 'In Stock',
                                                'bg-rose-50 text-rose-700 border-rose-200': item.status === 'Out of Stock',
                                                'bg-amber-50 text-amber-700 border-amber-200': item.status === 'Restock'
                                              }"
                                              x-text="item.status">
                                        </span>
                                    </td>

                                    <!-- Rating -->
                                    <td class="py-3.5 px-4 text-center">
                                        <div class="inline-flex items-center gap-1 font-bold text-gray-800">
                                            <i data-lucide="star" class="w-3.5 h-3.5 text-amber-400 fill-amber-400"></i>
                                            <span x-text="item.rating.toFixed(1)"></span>
                                        </div>
                                    </td>

                                    <!-- Action -->
                                    <td class="py-3.5 px-3 text-center text-gray-400 hover:text-gray-700 cursor-pointer">
                                        <i data-lucide="more-horizontal" class="w-4 h-4 mx-auto"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer Bar -->
                <div class="p-4 border-t border-gray-200/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs select-none">
                    <!-- Limit per page -->
                    <div class="flex items-center gap-2 text-gray-500">
                        <span>Showing per page:</span>
                        <select class="bg-gray-50 border border-gray-200 rounded-lg px-2 py-1 text-xs font-semibold text-gray-700 focus:outline-none focus:border-brand-orange">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                    </div>

                    <!-- Page Numbers -->
                    <div class="flex items-center gap-1">
                        <button class="w-7 h-7 rounded-lg text-gray-400 hover:bg-gray-100 flex items-center justify-center">
                            <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                        </button>
                        <button class="w-7 h-7 rounded-full bg-brand-orange text-white font-bold flex items-center justify-center shadow-xs">1</button>
                        <button class="w-7 h-7 rounded-lg text-gray-600 hover:bg-gray-100 flex items-center justify-center font-medium">2</button>
                        <button class="w-7 h-7 rounded-lg text-gray-600 hover:bg-gray-100 flex items-center justify-center font-medium">3</button>
                        <span class="px-1 text-gray-400">...</span>
                        <button class="w-7 h-7 rounded-lg text-gray-600 hover:bg-gray-100 flex items-center justify-center font-medium">25</button>
                        <button class="w-7 h-7 rounded-lg text-gray-400 hover:bg-gray-100 flex items-center justify-center">
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                        </button>
                    </div>

                    <!-- Quick Jump -->
                    <div class="flex items-center gap-2 text-gray-500">
                        <span>Go to page</span>
                        <input type="text" class="w-10 text-center py-1 bg-gray-50 border border-gray-200 rounded-lg text-xs font-medium focus:outline-none focus:border-brand-orange" placeholder="1" />
                        <button class="px-2.5 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition">Go &gt;</button>
                    </div>
                </div>
            </div>

            <!-- ==================== FLOATING BATCH ACTION BAR ==================== -->
            <div x-show="selectedItems.length > 0" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-8"
                 class="fixed bottom-6 left-1/2 -translate-x-1/2 bg-gray-900 text-white px-5 py-2.5 rounded-2xl shadow-2xl flex items-center gap-4 z-50 border border-gray-800 text-xs">
                
                <div class="flex items-center gap-2 pr-3 border-r border-gray-700">
                    <span class="w-5 h-5 rounded-full bg-brand-orange text-white font-bold text-[10px] flex items-center justify-center" x-text="selectedItems.length"></span>
                    <span class="font-semibold">Selected</span>
                </div>

                <div class="flex items-center gap-2">
                    <button class="px-3 py-1.5 rounded-xl hover:bg-gray-800 text-gray-200 flex items-center gap-1.5 transition">
                        <i data-lucide="tag" class="w-3.5 h-3.5 text-orange-400"></i>
                        <span>Apply Code</span>
                    </button>
                    <button class="px-3 py-1.5 rounded-xl hover:bg-gray-800 text-gray-200 flex items-center gap-1.5 transition">
                        <i data-lucide="edit-3" class="w-3.5 h-3.5 text-blue-400"></i>
                        <span>Edit Info</span>
                    </button>
                    <button @click="deleteSelected" class="px-3 py-1.5 rounded-xl hover:bg-red-950/60 text-red-400 flex items-center gap-1.5 transition">
                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                        <span>Delete</span>
                    </button>
                </div>

                <button @click="selectedItems = []" class="p-1 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition ml-1">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>

        </div>
    </main>

    <!-- Alpine.js Component Logic -->
    <script>
        function productDashboard() {
            return {
                sidebarOpen: true,
                showStatistics: true,
                selectedItems: [1, 2], // default terpilih 2 item agar sesuai tampilan preview

                metrics: [
                    { title: 'Total Product', value: '250', change: '+ 3 product' },
                    { title: 'Product Revenue', value: '$15,490', change: '+ 9%' },
                    { title: 'Product Sold', value: '2,355', change: '+ 7%' },
                    { title: 'Avg. Monthly Sales', value: '890', change: '+ 5%' }
                ],

                products: [
                    { id: 1, name: 'Uxerflow T-Shirt #10 - White', price: 1.35, sales: 471, revenue: 635.85, stock: 100, status: 'In Stock', rating: 5.0 },
                    { id: 2, name: 'Uxerflow T-Shirt #10 - Black', price: 1.35, sales: 402, revenue: 544.05, stock: 0, status: 'Out of Stock', rating: 5.0 },
                    { id: 3, name: 'SmartHome Hub 4-Port', price: 150.00, sales: 7, revenue: 1050.00, stock: 12, status: 'In Stock', rating: 4.8 },
                    { id: 4, name: 'ProVision 4K Gaming Monitor', price: 400.25, sales: 1, revenue: 400.25, stock: 3, status: 'Restock', rating: 5.0 },
                    { id: 5, name: 'Ergonomic Office Desk Chair', price: 89.90, sales: 54, revenue: 4854.60, stock: 45, status: 'In Stock', rating: 4.9 },
                    { id: 6, name: 'Mechanical Keyboard RGB Custom', price: 65.00, sales: 88, revenue: 5720.00, stock: 20, status: 'In Stock', rating: 4.7 },
                    { id: 7, name: 'Wireless Active Noise-Cancel Headset', price: 120.00, sales: 0, revenue: 0.00, stock: 0, status: 'Out of Stock', rating: 4.6 },
                    { id: 8, name: 'USB-C Multiport Charging Dock', price: 45.50, sales: 110, revenue: 5005.00, stock: 8, status: 'Restock', rating: 4.9 }
                ],

                get isAllSelected() {
                    return this.selectedItems.length === this.products.length && this.products.length > 0;
                },

                toggleSelectAll() {
                    if (this.isAllSelected) {
                        this.selectedItems = [];
                    } else {
                        this.selectedItems = this.products.map(p => p.id);
                    }
                },

                isSelected(id) {
                    return this.selectedItems.includes(id);
                },

                toggleSelect(id) {
                    const idx = this.selectedItems.indexOf(id);
                    if (idx > -1) {
                        this.selectedItems.splice(idx, 1);
                    } else {
                        this.selectedItems.push(id);
                    }
                },

                deleteSelected() {
                    if (confirm(`Yakin ingin menghapus ${this.selectedItems.length} produk terpilih?`)) {
                        this.products = this.products.filter(p => !this.selectedItems.includes(p.id));
                        this.selectedItems = [];
                    }
                }
            };
        }
    </script>
</body>
</html>
