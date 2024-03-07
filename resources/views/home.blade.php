<x-app-layout title="Home">

    <div class="container max-w-sm mx-auto">
        <div class="py-14">
            <h1 class="text-lg">SSO Ardev</h1>
        </div>
        <div class="mt-3">
            <div class="text-2xl font-bold">Selamat Datang 👏</div>
            <div class="flex flex-col gap-5 sm:flex-row my-9">
                <div class="">
                    <img class="w-24 h-24 border rounded-full" src="{{ auth()->user()->avatar }}" alt="">
                </div>
                <div class="flex flex-col gap-3">
                    <div class="">
                        <p class="font-bold">Nama</p>
                        <p>{{ auth()->user()->name }}</p>
                    </div>
                    <div class="">
                        <p class="font-bold">Email</p>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                    <div class="">
                       <a class="p-2 px-4 text-sm text-white bg-blue-500 rounded-lg" href="">Ubah Kata Sandi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
