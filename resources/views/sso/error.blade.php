<x-app-layout class="sm:bg-gray-100 flex flex-col items-center justify-center h-screen">
    <div class="bg-white flex flex-col items-center justify-center gap-5 max-w-lg mx-auto p-5 shadow-xl rounded-md">
        <i class="pi pi-cog text-8xl"></i>
        <h1 class="text-lg text-center font-semibold text-gray-700 uppercase">
            {{ $error }}
        </h1>
        <p class="text-center">
            Aplikasi ini tidak bisa diakses sekarang dan developer aplikasi mengetahui masalah ini. Anda akan bisa login ketika aplikasi diaktifkan kembali.
        </p>
        <button onclick="window.location.href='{{ route('home') }}'" class="bg-blue-500 mb-3 px-4 py-2 rounded-lg text-white text-sm font-semibold">OK!</button>
    </div>
</x-app-layout>
