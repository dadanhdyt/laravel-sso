<x-app-layout title="Home" class="bg-gray-100">
    @include('shared.navbar')
    <div class="container max-w-md px-3 sm:px-0 sm:max-w-6xl mx-auto">
        <h1 class="my-5 font-bold text-lg uppercase text-red-500">Updata Password</h1>
        <div class="max-w-3xl w-full rounded bg-white p-4">
            <form method="POST" action="" class="flex flex-col gap-3 py-9 px-3">
                @method('patch')
                @csrf
                <div class="mb-2">
                    <label for="password_lama">Password Lama</label>
                    <input type="text" name="password_lama" class="w-full">
                    @error('password_lama')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:flex">
                    <div class="w-full">
                        <label for="password_baru">Password Baru</label>
                        <input name='password' type="text" class="w-full">
                        @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="repeat">Ketikan ulang passwrd baru</label>
                        <input name="password_confirmation" type="text" class="w-full">
                        @error('password_confirmation')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button class="mt-4 p-2 px-3 bg-blue-500 border rounded text-white">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
