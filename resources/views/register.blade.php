<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dulu le</title>
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
    <div class="bg-white rounded-lg shadow-lg p-8">
      <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Buat Akun Baru</h1>
        <p class="text-gray-600">Daftar untuk masuk ke dashboard admin</p>
      </div>

      @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
          <ul class="list-disc list-inside text-left">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="/register">
        @csrf

        {{-- Name --}}
        <div class="mb-5">
          <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
            Nama Lengkap
          </label>
          <input
            type="text"
            id="name"
            name="name"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200"
            placeholder="Masukan nama"
            value="{{ old('name') }}"
          >
        </div>

        {{-- Email --}}
        <div class="mb-5">
          <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
            Email
          </label>
          <input
            type="email"
            id="email"
            name="email"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200"
            placeholder="Masukan email"
            value="{{ old('email') }}"
          >
        </div>

        {{-- Password --}}
        <div class="mb-5">
          <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
            Password
          </label>
          <input
            type="password"
            id="password"
            name="password"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200"
            placeholder="Minimal 6 karakter"
          >
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-6">
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
            Konfirmasi Password
          </label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200"
            placeholder="Ulangi password"
          >
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
          Daftar
        </button>

        <div class="text-center mt-6">
          <p class="text-sm text-gray-600">
            Sudah punya akun?
            <a href="/login" class="text-blue-600 hover:text-blue-700 font-medium hover:underline">
              Login di sini
            </a>
          </p>
        </div>
      </form>

      <p class="text-center text-sm text-gray-500 mt-6">
        &copy; 2025 Wisnu Genk. All rights reserved.
      </p>
    </div>
  </div>
</body>
</html>
