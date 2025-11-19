<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen bg-gradient-to-br from-blue-600 via-blue-500 to-yellow-300 text-white">

    <!-- Header -->
    <header class="w-full border-t border-[#19140035] dark:border-[#3E3E3A] py-4">
        <div class="max-w-5xl mx-auto px-6 flex justify-end items-center">
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 text-white border border-transparent hover:border-white rounded-sm text-sm leading-normal transition"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 text-white font-semibold border border-transparent hover:border-white rounded-sm text-sm leading-normal transition"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 text-white border font-semibold border-white hover:border-gray-300 rounded-sm text-sm leading-normal transition"
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
    <main class="flex-1 flex items-center justify-center px-6 backdrop-blur-sm bg-blue-900/60">

        <div class="flex flex-col lg:flex-row items-center gap-10">

            <!-- TEKS -->
            <div class="text-center lg:text-left">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4 text-white">
                    Selamat Datang
                </h1>
                <p class="text-lg text-gray-200">
                    Silakan login atau register untuk mulai menggunakan aplikasi.
                </p>
            </div>

            <!-- ANIMASI LOTTIE -->
            <lottie-player
                src="/lottie/mascot-animation.json"
                background="transparent"
                speed="1"
                style="width: 480px; height: 480px;"
                loop
                autoplay
            ></lottie-player>

        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full border-t border-[#19140035] dark:border-[#3E3E3A] py-4 text-center text-sm text-gray-200">
        &copy; {{ date('Y') }} Booking Room System. All rights reserved.
    </footer>

</body>
</html>
