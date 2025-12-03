<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Datang Jir</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <style>
        @keyframes admin-gradient-move {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .bg-admin-animated {
            background: linear-gradient(135deg, #cfe5f4ff, #6e82c2ff, #8cb1fbff);
            background-size: 200% 200%;
            animation: admin-gradient-move 16s ease-in-out infinite;
        }
        @keyframes sidebar-slide-in {
            from { transform: translateX(-100%); opacity: 0; }
            to   { transform: translateX(0); opacity: 1; }
        }
        .sidebar-animate { animation: sidebar-slide-in 0.4s ease-out; }
        @keyframes content-fade-up {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .content-animate { animation: content-fade-up 0.5s ease-out; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="flex h-screen bg-admin-animated text-gray-900">

    {{-- Sidebar --}}
   <aside
    id="sidebar"
    class="fixed inset-y-0 left-0 z-40
           w-64 bg-blue-700/95 backdrop-blur text-white
           space-y-6 py-7 px-2
           transform -translate-x-full md:translate-x-0
           transition-transform duration-200 ease-in-out shadow-xl sidebar-animate">

        <a href="{{ route('admin.dashboard') }}" class="text-white flex items-center space-x-2 px-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 11c0 1.656-1.343 3-3 3a3 3 0 100-6c1.657 0 3 1.344 3 3zm0 0v.01" />
            </svg>
            <span class="text-2xl font-extrabold">Admin</span>
        </a>

        <nav>
            <a href="{{ route('admin.dashboard') }}"
               class="block py-2.5 px-4 rounded hover:bg-blue-600
                      {{ request()->routeIs('admin.dashboard') ? 'bg-blue-900' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.users') }}"
               class="block py-2.5 px-4 rounded hover:bg-blue-600
                      {{ request()->routeIs('admin.users') ? 'bg-blue-900' : '' }}">
                Users
            </a>
            <a href="{{ route('admin.settings') }}"
               class="block py-2.5 px-4 rounded hover:bg-blue-600
                      {{ request()->routeIs('admin.settings') ? 'bg-blue-900' : '' }}">
                Settings
            </a>
        </nav>
    </aside>

    {{-- Content --}}
    <div class="flex-1 flex flex-col content-animate md:ml-64">
        {{-- Overlay untuk mobile --}}
    <div id="overlay"class="fixed inset-0 bg-black/40 z-30 hidden md:hidden"></div>

        {{-- Header --}}
        <header class="flex items-center justify-between bg-white p-4 shadow-md">
            <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <h1 class="text-xl font-semibold text-gray-700">
                @yield('header', 'Selamat Datang Tuan/Nyonya')  <span class="text-blue-700 animate-pulse">
            {{ auth()->user()->name }}
            </span>
            </h1>
            
           

            @auth
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 text-white
                                   flex items-center justify-center text-sm font-semibold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-800">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="text-xs text-gray-500">
                                Administrator
                            </p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="text-sm px-3 py-1 rounded bg-red-500 text-white
                                   hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </header>

        {{-- Konten halaman --}}
        <main class="flex-1 p-6 space-y-8">
            @yield('content')
        </main>
    </div>

    <script>
       const btn = document.getElementById('menu-btn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    }

    if (btn && sidebar && overlay) {
        // Klik burger: toggle
        btn.addEventListener('click', () => {
            const isHidden = sidebar.classList.contains('-translate-x-full');
            if (isHidden) {
                openSidebar();
            } else {
                closeSidebar();
            }
        });

        // Klik overlay: tutup
        overlay.addEventListener('click', closeSidebar);
    }
    </script>
</body>
</html>
