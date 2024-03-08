<x-app-layout title="Home" class="bg-gray-100">
    @include('shared.navbar')
    <div class="container max-w-md px-3 sm:px-0 sm:max-w-6xl mx-auto">
        <h1 class="my-5 font-bold text-lg uppercase text-red-500">Profile</h1>
        <div class="flex flex-col sm:flex-row justify-between gap-7">
            <div class="max-w-4xl w-full">
                <div class="bg-white p-4 px-5 rounded">
                    <div class="border-b mb-3 pb-4 text-red-500 font-semibold">Overview</div>
                    <div class="flex flex-col sm:flex-row gap-5 justify-between py-2">
                        <div class="max-w-[200px] max-h-[200px] overflow-hidden rounded-lg w-full">
                            <img class="w-full rounded-lg" src="{{ auth()->user()->avatar }}" alt="">
                        </div>
                        <div class="max-w-full w-full">
                            <div class="grid grid-cols-1 gap-4">
                                <div class="flex border-b pb-1 justify-between">
                                    <span class="flex items-center gap-1  text-gray-600"><i class="pi pi-user"></i>Nama</span>
                                    <p class="font-bold text-gray-700">
                                        {{ auth()->user()->name }}
                                    </p>
                                </div>
                                <div class="flex border-b pb-1 justify-between">
                                    <span class="flex items-center gap-1  text-gray-600"><i class="pi pi-at"></i>Alamat Email</span>
                                    <p class="font-bold text-gray-700">
                                        {{ auth()->user()->email }}
                                    </p>
                                </div>
                                <div class="flex border-b pb-1 justify-between">
                                    <span class="flex items-center gap-1  text-gray-600"><i class="pi pi-mobile"></i>No Telpon</span>
                                    <p class="font-bold text-gray-700">
                                        {{ auth()->user()->no_telp }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 flex items-center gap-3">
                                <button onclick="location.href='{{ route('update-password') }}'" class="p-2 flex flex-row items-center bg-red-500 rounded-lg text-sm text-white">
                                    <i class="pi pi-key"></i>
                                    Update Password</button>
                                <button class="p-2 flex flex-row items-center bg-blue-500 rounded-lg text-sm text-white">
                                    <i class="pi pi-user-edit"></i>
                                    Edit Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sm:max-w-sm mb-4 sm:mb-0 w-full">
                <div class="bg-white px-5 py-2 rounded-lg">
                    <div class="mb-2 text-red-500 font-semibold uppercase">Aplikasi Terhubung</div>
                   @if (count($apps) === 0)
                    <div>Tidak ada aplikasi terhubung</div>
                       @else
                       <div class="grid gap-3 grid-cols-1 my-4">

                        @foreach ($apps as $item)
                        <div class="p-3 items-center flex gap-3 bg-green-100/50 border-green-300 rounded border">
                            <div class="w-8 rounded overflow-hidden bg-slate-500 h-8">

                            </div>
                            <div class="flex flex-col">
                                {{ $item->nama }}
                                <a class="text-xs" href="">{{ $item->homepage_url }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                   @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
