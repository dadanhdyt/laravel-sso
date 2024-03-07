<x-app-layout class='bg-gray-100'>
    <div class="min-h-screen flex justify-center items-center">
        <div class="bg-white p-8 rounded shadow-lg md:w-1/3 w-full">
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">Login SSO argandev.id</h2>
            <h3 class="text-sm text-gray-600 mb-4">Satu akun untuk semua layanan kami</h3> <!-- New Title Added -->
            <form action="#" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                    <input value="{{ old('email') }}" type="email" id="email"  name="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Enter your email" autocomplete="none" >
                    @error('email')
                    <div class="flex mt-1 text-sm text-red-500 flex-row items-center gap-1">
                        <i class="pi pi-times-circle error-icon"></i>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input value="{{ old('password') }}" type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Enter your password" >
                    @error('password')
                    <div class="flex mt-1 text-sm text-red-500 flex-row items-center gap-1">
                        <i class="pi pi-times-circle error-icon"></i>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:bg-blue-600">Login</button>
            </form>
            <div class="mt-4 text-center">
                <a href="#" class="text-sm text-blue-500">Forgot Password?</a>
            </div>
        </div>
    </div>
</x-app-layout>
