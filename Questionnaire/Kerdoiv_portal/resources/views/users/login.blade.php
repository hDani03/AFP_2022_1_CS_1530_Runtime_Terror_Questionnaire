<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Bejelentkezés/Belépés vendégként
            </h2>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">E-mail cím</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Jelszó
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                    value="{{ old('password') }}" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black">
                    Bejelentkezés
                </button>

                <form method="POST" action="/users/loginasguest">
                    <button type="submit" class="bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black">
                        Belépés vendégként
                    </button>
                </form>
            </div>

            <div class="mt-8">
                <p>
                    Szeretne regisztrálni?
                    <a href="/register" class="text-cyan-600">Itt megteheti.</a>
                </p>
            </div>

        </form>





    </x-card>
</x-layout>
