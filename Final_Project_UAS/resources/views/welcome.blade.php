<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen">

    <!-- Header -->
    <header class="w-full border-t border-[#19140035] dark:border-[#3E3E3A] py-4">
        <div class="max-w-5xl mx-auto px-6 flex justify-end items-center">
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border border-transparent hover:border-[#3E3E3A] text-[#1b1b18] dark:hover:text-[#EDEDEC] rounded-sm text-sm leading-normal transition"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#3E3E3A] rounded-sm text-sm leading-normal transition"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border border-[#19140035] hover:border-[#1915014a] text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal transition"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col justify-center items-center text-center px-6">
        <h1 class="text-4xl lg:text-5xl font-bold mb-4 dark:text-[#EDEDEC]">
            Selamat Datang 
        </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Silakan login atau register untuk mulai menggunakan aplikasi.
            </p>
    </main>

    <!-- Footer -->
    <footer class="w-full border-t border-[#19140035] dark:border-[#3E3E3A] py-4 text-center text-sm text-gray-500 dark:text-gray-400">
        &copy; {{ date('Y') }} Booking Room System. All rights reserved.
    </footer>

</body>
</html>
