<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Dosen
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Selamat datang, <strong>{{ auth()->user()->name }}</strong>! Anda login sebagai <strong>Dosen
                        Pembimbing</strong>.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>