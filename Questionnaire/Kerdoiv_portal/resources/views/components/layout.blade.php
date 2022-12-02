<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Questionary | Kérdőívportál</title>
    @vite('resources/css/app.css')
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/">
            <img class="xxs:w-14 xs:w-24 sm:w-24 md:w-24 lg:w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" />
        </a>
        <ul class="md:text-lg  sm:justify-around text-center xxs:text-sm flex space-x-6 mr-6 ">
            @auth
                <li>
                    <span class="font-bold uppercase">Üdv, {{ auth()->user()->name }}</span>
                </li>

                <li>
                    <a href="/surveys/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Kérdőívek kezelése</a>
                </li>

                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Kijelentkezés
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Regisztráció</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Bejelentkezés</a>
                </li>
            @endauth
        </ul>
    </nav>

    <main>
        {{-- VIEW OUTPUT --}}
        {{-- @yield('content') --}}
        {{ $slot }}
    </main>


    <footer
        class="fixed bottom-0 left-0 w-full flex items-center font-bold bg-cyan-600 text-white h-20 mt-20 opacity-90 
        md:justify-center
        sm:text-sm justify-start text-center">
        <p class="ml-2">AFP I. gy. Runtime Terror csapat projektje</p>

        <a href="/surveys/create" 
        class="lg:absolute top-1/3 right-10 bg-black text-white py-2 px-5
            md:absolute top-1/3 ml-20 mr-5
            sm:absolute ml-20 mr-5  text-center"> Kérdőív létrehozása
        </a>
    </footer>

    <x-flash-message />
</body>

</html>
