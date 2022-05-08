<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ Storage::URL('public/imgs/logo.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>

<body>
    <div class="bg-white shadow-md" x-data="{ isOpen: false }">
        <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
                    href="{{ route('welcome') }}">
                    Mixture
                </a>
                <!-- Mobile menu button -->
                <div @click="isOpen = !isOpen" class="flex md:hidden">
                    <button type="button"
                        class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div :class="isOpen ? 'flex' : 'hidden'"
                class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0 text-xl">
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{ route('welcome') }}">Trang chủ</a>
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{ route('categories.index') }}">Loại món</a>
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{ route('menus.index') }}">Thực đơn</a>
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{ route('reservations.step.one') }}">Đặt bàn</a>
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{ route('admin.index') }}">Admin</a>
            </div>
        </nav>
    </div>
    <div class="font-sans text-gray-900 antialiased min-h-screen">
        <div>
            @if (session()->has('danger'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <span class="font-medium">{{ session()->get('danger') }}!</span>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-medium">{{ session()->get('success') }}!</span>
                </div>
            @endif
            @if (session()->has('warning'))
                <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                    role="alert">
                    <span class="font-medium">{{ session()->get('warning') }}!</span>
                </div>
            @endif
        </div>
        {{ $slot }}
    </div>
    <footer class="bg-gray-800 border-t border-gray-200">
        <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
            <div class="flex flex-wrap justify-center">
                <ul class="flex items-center space-x-4 text-white">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    <li>Terms</li>
                </ul>
            </div>
            <div class="flex justify-center mt-4 lg:mt-0">
                <div class="relative w-12 h-12 ml-4 hover:scale-100">
                    <a href="https://nguyen-to-thuy-anh.github.io/Anh-profile/?fbclid=IwAR0JV_50XgtiNMFJJHoCNOeW0nff1Tp9mrgMVCz1vG454EM3U9Hfdu0_Tkg#home">
                        <img class="rounded-full border border-gray-100 shadow-sm hover:border-red-700" src="{{ Storage::URL('public/imgs/Anh.jpg') }}" alt="user image" />
                    </a>
                </div>
                <div class="relative w-12 h-12 ml-4">
                    <a href="https://ddinhcchi.github.io/profile/">
                        <img class="rounded-full border border-gray-100 shadow-sm hover:border-red-700" src="{{ Storage::URL('public/imgs/Dinh.jpg') }}" alt="user image" />
                    </a>
                </div>
                <div class="relative w-12 h-12 ml-4">
                    <a href="https://nguyenhoxuanhuong.github.io/My-CV/">
                        <img class="rounded-full border border-gray-100 shadow-sm hover:border-red-700" src="{{ Storage::URL('public/imgs/Huong.jpg') }}" alt="user image" />
                    </a>
                </div>
                <div class="relative w-12 h-12 ml-4">
                    <a href="https://macdinhthy.github.io/myThyyy/">
                        <img class="rounded-full border border-gray-100 shadow-sm hover:border-red-700" src="{{ Storage::URL('public/imgs/Thy.jpg') }}" alt="user image" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>
