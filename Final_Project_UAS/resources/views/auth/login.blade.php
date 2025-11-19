<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Room Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 via-blue-500 to-yellow-300 p-6">

    <!-- WRAPPER CARD -->
    <div class="bg-white w-full max-w-5xl rounded-3xl shadow-2xl overflow-hidden flex flex-col lg:flex-row">

        <!-- LEFT FORM -->
        <div class="w-full lg:w-1/2 p-10 lg:p-14">

            <h1 class="text-blue-600 font-bold text-2xl">Room Booking</h1>
            <p class="mt-2 text-gray-500">Welcome back!</p>

            <h2 class="text-4xl font-extrabold mt-3 mb-8 text-gray-800">Log In</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <label class="text-sm text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full mt-2 mb-3 px-4 py-3 rounded-lg bg-blue-100 border border-blue-200 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="you@example.com" required>
                @error('email')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <!-- PASSWORD -->
                <div class="flex justify-between items-center">
                    <label class="text-sm text-gray-700">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-xs text-blue-600 hover:text-blue-800">Forgot Password?</a>
                    @endif
                </div>

                <input type="password" name="password"
                    class="w-full mt-2 mb-2 px-4 py-3 rounded-lg bg-blue-100 border border-blue-200 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    required placeholder="********">
                @error('password')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <!-- REMEMBER ME -->
                <label class="flex items-center mt-1 mb-4">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-gray-700 text-sm">Remember Me</span>
                </label>

                <!-- LOGIN BUTTON -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-full mt-4 transition">
                    LOGIN →
                </button>
            </form>

            <!-- SIGNUP -->
            <p class="text-center text-sm text-gray-700 mt-6">
                Don't have an account?
                <a href="{{ route('register.user') }}" class="text-blue-700 font-semibold hover:underline">
                    Sign up for free
                </a>
            </p>
        </div>

        <!-- RIGHT IMAGE -->
        <div class="w-full lg:w-1/2 bg-gradient-to-br from-blue-200 via-blue-300 to-yellow-200 flex justify-center items-center p-10">
            <img src="/images/login-3d.png"  class="w-[6500px] lg:w-[700px] mt-10 lg:mt-20" alt="Login Illustration">
        </div>
    </div>

</body>

</html>
