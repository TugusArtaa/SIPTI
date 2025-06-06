<x-app-layout>
    {{-- Header Section --}}
    <div
        class="mb-8 bg-white dark:bg-white/[0.03] border border-gray-200 dark:border-white/10 rounded-2xl p-6 shadow-none dark:shadow-lg">
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Kelola Data Perusahaan Mitra</h1>
                <p class="text-gray-900 dark:text-blue-100 text-sm">Lihat, tambah, dan kelola data perusahaan mitra pada
                    Sistem Informasi
                    PKL Teknologi Informasi.</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
        </div>
    </div>

    {{-- Area Tombol --}}
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            {{-- Form Search --}}
            <form method="GET" action="{{ route('admin.perusahaan.index') }}" class="flex items-center gap-3 h-[48px]">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari Nama, Alamat, No. HP..."
                    class="h-[48px] px-4 py-2 rounded-lg border border-gray-300 dark:border-slate-600 focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm w-96 dark:bg-slate-800 dark:text-white transition-all duration-200 shadow-sm"
                    autocomplete="off">
                <button type="submit"
                    class="h-[48px] w-[48px] flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-semibold transition-all duration-200"
                    aria-label="Cari">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                </button>
                @if(request('search'))
                <a href="{{ route('admin.perusahaan.index') }}"
                    class="h-[48px] flex items-center ml-2 text-sm text-gray-500 dark:text-slate-300 underline">Reset</a>
                @endif
            </form>
            {{-- End Form Search --}}
        </div>
        <a href="{{ route('admin.perusahaan.create') }}"
            class="inline-flex items-center px-6 py-3 bg-blue-500/90 dark:bg-blue-500/80 hover:bg-blue-600 dark:hover:bg-blue-500 text-white font-semibold rounded-lg transition-all duration-200 border border-blue-200 dark:border-blue-400/30 hover:border-blue-400/50 shadow-none dark:shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Tambah Perusahaan
        </a>
    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="mb-6 bg-emerald-100 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Perusahaan --}}
    <div
        class="bg-white dark:bg-white/5 rounded-xl border border-gray-200 dark:border-white/10 overflow-hidden shadow-none dark:shadow-xl">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-slate-700/30">
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider w-10">
                            No.</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                            Nama</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                            Alamat</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                            No. HP</th>
                        <th
                            class="px-6 py-4 text-center text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-white/10">
                    @forelse($perusahaan as $index => $item)
                    <tr class="hover:bg-gray-100 dark:hover:bg-white/5 transition-colors duration-200">
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 font-medium max-w-[64px] truncate overflow-hidden">
                            {{ $perusahaan->firstItem() + $index }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium max-w-[260px] truncate overflow-hidden">
                            {{ $item->nama }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 max-w-[260px] truncate overflow-hidden">
                            {{ $item->alamat }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 max-w-[128px] truncate overflow-hidden">
                            {{ $item->no_hp }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center max-w-[128px]">
                            <a href="{{ route('admin.perusahaan.edit', $item) }}"
                                class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 bg-blue-100 dark:bg-blue-600/20 hover:bg-blue-200 dark:hover:bg-blue-600/30 text-blue-700 dark:text-blue-300 hover:text-blue-900 dark:hover:text-blue-200 text-sm font-medium rounded-lg transition-all duration-200 border border-blue-200 dark:border-blue-500/30 hover:border-blue-300 dark:hover:border-blue-500/50 mr-2 group relative">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21h6l11-11a2.828 2.828 0 00-4-4L5 17v4z">
                                    </path>
                                </svg>
                                <span
                                    class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 px-2 py-1 rounded bg-gray-800 text-white text-xs opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-200 whitespace-nowrap z-10">Edit</span>
                            </a>
                            <form method="POST" action="{{ route('admin.perusahaan.destroy', $item) }}"
                                onsubmit="return confirm('Hapus perusahaan ini?')" class="inline group relative">
                                @csrf @method('DELETE')
                                <button
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-100 dark:bg-red-600/20 hover:bg-red-200 dark:hover:bg-red-600/30 text-red-700 dark:text-red-300 hover:text-red-900 dark:hover:text-red-200 text-sm font-medium rounded-lg transition-all duration-200 border border-red-200 dark:border-red-500/30 hover:border-red-300 dark:hover:border-red-500/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    <span
                                        class="absolute left-1/2 -translate-x-1/2 bottom-full mb-3 px-2 py-1 rounded bg-gray-800 text-white text-xs opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-200 whitespace-nowrap z-10">Hapus</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mb-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                <p class="text-gray-500 dark:text-slate-400 text-xl font-semibold mb-2">Belum ada data
                                    perusahaan</p>
                                <p class="text-gray-400 dark:text-slate-500 text-sm">Mulai dengan menambah perusahaan
                                    baru</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    @if($perusahaan->hasPages())
    <div class="mt-6 flex items-center justify-between">
        {{-- Info pagination --}}
        <div class="flex items-center text-sm text-gray-500 dark:text-slate-400">
            <span>
                Menampilkan {{ $perusahaan->firstItem() ?? 0 }} - {{ $perusahaan->lastItem() ?? 0 }}
                dari {{ $perusahaan->total() }} perusahaan
            </span>
        </div>

        {{-- Navigation pagination --}}
        <nav class="flex items-center space-x-2">
            {{-- Previous Button --}}
            @if ($perusahaan->onFirstPage())
            <span
                class="px-3 py-2 text-sm text-gray-400 dark:text-slate-500 bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-lg cursor-not-allowed">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </span>
            @else
            <a href="{{ $perusahaan->previousPageUrl() }}"
                class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-gray-100 dark:bg-white/5 hover:bg-gray-200 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($perusahaan->getUrlRange(max(1, $perusahaan->currentPage() - 2), min($perusahaan->lastPage(),
            $perusahaan->currentPage() + 2)) as $page => $url)
            @if ($page == $perusahaan->currentPage())
            <span
                class="px-3 py-2 text-sm text-white dark:text-white bg-blue-600/80 dark:bg-blue-600/80 border border-blue-500/50 rounded-lg font-medium">
                {{ $page }}
            </span>
            @else
            <a href="{{ $url }}"
                class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-gray-100 dark:bg-white/5 hover:bg-gray-200 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 hover:text-gray-900 dark:hover:text-white">
                {{ $page }}
            </a>
            @endif
            @endforeach

            {{-- Show dots jika ada banyak halamannya --}}
            @if($perusahaan->currentPage() < $perusahaan->lastPage() - 2)
                <span class="px-2 py-2 text-gray-400 dark:text-slate-500">...</span>
                <a href="{{ $perusahaan->url($perusahaan->lastPage()) }}"
                    class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-gray-100 dark:bg-white/5 hover:bg-gray-200 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200 hover:text-gray-900 dark:hover:text-white">
                    {{ $perusahaan->lastPage() }}
                </a>
                @endif
                {{-- Next Button --}}
                @if ($perusahaan->hasMorePages())
                <a href="{{ $perusahaan->nextPageUrl() }}"
                    class="px-3 py-2 text-sm text-gray-700 dark:text-slate-300 bg-gray-100 dark:bg-white/5 hover:bg-gray-200 dark:hover:bg-white/10 border border-gray-200 dark:border-white/10 hover:border-gray-300 dark:hover:border-white/20 rounded-lg transition-all duration-200">
                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                @else
                <span
                    class="px-3 py-2 text-sm text-gray-400 dark:text-slate-500 bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-lg cursor-not-allowed">
                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
                @endif
        </nav>
    </div>
    @endif
</x-app-layout>