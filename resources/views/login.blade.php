<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dulu le</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
  @keyframes gradient-move {
    0%   { background-position: 0% 50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .bg-ungu-bergerak {
    background: linear-gradient(135deg, #61baf6ff, #eef2ff, #e5e7eb);
    background-size: 300% 300%;
    animation: gradient-move 12s ease-in-out infinite;
  }
</style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-ungu-bergerak">
  <div class="w-full max-w-md">
  <!-- script toggle password tetap -->
</body>
    <div class="w-full max-w-md">
        <!-- Card Container -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang</h1>
                <p class="text-gray-600">Silakan login ke akun Anda</p>
            </div>

            <!-- ✅ Tampilkan Pesan Error dari Laravel -->
            @if ($errors->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center">
                    <strong>{{ $errors->first('error') }}</strong>
                </div>
            @endif

            <!-- Login Form -->
            <form id="loginForm" method="POST" action="/login">
                @csrf
                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200"
                        placeholder="Masukan Email"
                        value="{{ old('email') }}"
                    >
                    <p class="text-red-500 text-sm mt-1 hidden" id="emailError"></p>
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200"
                            placeholder="Masukkan password"
                        >
                        <button 
                            type="button" 
                            id="togglePassword"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
                        >
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm mt-1 hidden" id="passwordError"></p>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                    <a href="/forgot-password" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                        Lupa Password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200"
                >
                    Login
                </button>

                <!-- Register Link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Belum punya akun? 
                        <a href="/register" class="text-blue-600 hover:text-blue-700 font-medium hover:underline">
                            Daftar Sekarang
                        </a>
                    </p>
                </div>
            </form>

        <!-- Footer Text -->
        <p class="text-center text-sm text-gray-500 mt-6">
            &copy; 2025 Wisnu Genk. All rights reserved.
        </p>
    </div>

    <script>
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            if (type === 'text') {
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
            } else {
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        });
    </script>
</body>
</html>
