<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Mario Cafe Shop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --dark-green: #003300;
            --green: #006600;
            --white: #FFFFFF;
            --amber: #f59e0b;
            --slate: #64748b;
            --black: #000000;
            --dark-gray: #1f2937;
            /* amber-300 */
        }

        body {
            background-color: var(--black);
            color: var(--white);
        }

        .accent-green {
            background-color: var(--green);
        }

        .accent-white {
            color: var(--white);
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .lobster-regular {
            font-family: "Lobster", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .caprasimo-regular {
            font-family: "Caprasimo", serif;
            font-weight: 400;
            font-style: normal;
        }

        /* Navbar Styles */
        .nav-link {
            @apply relative text-white text-lg font-medium transition-colors duration-300;
        }

        .nav-link::after {
            content: '';
            @apply absolute left-0 bottom-0 w-0 h-0.5 bg-amber-300 transition-all duration-500 ease-out;
        }

        .nav-link:hover::after {
            @apply w-full;
        }

        .mobile-nav-link {
            @apply relative text-2xl text-white hover:text-amber-300 transition;
        }

        .mobile-nav-link::after {
            content: '';
            @apply absolute left-0 bottom-0 w-0 h-0.5 bg-amber-300/70 transition-all duration-500;
        }

        .mobile-nav-link:hover::after {
            @apply w-full;
        }
    </style>
</head>

<body class="h-full font-sans"> <!-- Padding untuk navbar fixed -->

    <!-- resources/views/components/header.blade.php atau langsung di home.blade.php -->
    <header id="main-header" class="fixed top-0 left-0 right-0 z-60 transition-all duration-700 bg-transparent py-6">
    <div class="container-fluid mx-auto px-6 md:px-14 flex items-center justify-between">

        <a href="#home" class="flex pb-2">
            <h1 class="text-4xl lobster-regular italic tracking-wide text-white">
                D'<span class="text-amber-300">Mario</span>
            </h1>
        </a>

        <nav class="hidden lg:flex items-center space-x-10 text-lg font-playfair font-bold">
            <a href="#home" class="nav-link text-white font-medium relative py-1">Home</a>
            <a href="{{ route('halaman.menu') }}" class="nav-link text-white font-medium relative py-1">Menu</a>
            <a href="#bestsellers" class="nav-link text-white font-medium relative py-1">Best Sellers</a>
            <a href="#about" class="nav-link text-white font-medium relative py-1">About</a>
            <a href="#footer" class="nav-link text-white font-medium relative py-1">Contact</a>
            <a href="{{ route('halaman.menu') }}">
                <button class="ml-4 px-4 py-2 bg-amber-500 text-white font-black uppercase tracking-tighter rounded-xl shadow-[0_0_20px_rgba(245,158,11,0.3)] transition-all duration-300 hover:scale-105 hover:shadow-amber-500/50 active:scale-95">
                    Order Now
                </button>
            </a>
        </nav>

        <button id="mobile-toggle" class="lg:hidden text-white focus:outline-none relative w-14 h-14 flex items-center justify-center z-70">
            <div class="relative w-8 h-8">
                <span id="line1" class="absolute block w-full h-0.5 bg-current transition-all duration-500 ease-[cubic-bezier(0.7,0,0.3,1)] top-0"></span>
                <span id="line2" class="absolute block w-full h-0.5 bg-current transition-all duration-500 ease-[cubic-bezier(0.7,0,0.3,1)] top-2.5"></span>
                <span id="line3" class="absolute block w-full h-0.5 bg-current transition-all duration-500 ease-[cubic-bezier(0.7,0,0.3,1)] top-5"></span>
            </div>
        </button>
    </div>

    <div id="mobile-menu-wrapper" class="grid grid-rows-[0fr] transition-[grid-template-rows] duration-500 ease-[cubic-bezier(0.7,0,0.3,1)] lg:hidden bg-black/90 backdrop-blur-2xl overflow-hidden">
        <div class="overflow-hidden">
            <nav class="container mx-auto px-8 py-10 flex flex-col items-center justify-center space-y-4 font-playfair">
                <a href="#home" class="mobile-nav-item group relative w-full py-4 text-center text-lg font-bold text-white uppercase tracking-widest">
                    <span class="mobile-hover-effect"></span>
                    <span class="relative z-10">Home</span>
                </a>
                <a href="{{ route('halaman.menu') }}" class="mobile-nav-item group relative w-full py-4 text-center text-lg font-bold text-white uppercase tracking-widest">
                    <span class="mobile-hover-effect"></span>
                    <span class="relative z-10">Menu</span>
                </a>
                <a href="#bestsellers" class="mobile-nav-item group relative w-full py-4 text-center text-lg font-bold text-white uppercase tracking-widest">
                    <span class="mobile-hover-effect"></span>
                    <span class="relative z-10">Best Sellers</span>
                </a>
                <a href="#about" class="mobile-nav-item group relative w-full py-4 text-center text-lg font-bold text-white uppercase tracking-widest">
                    <span class="mobile-hover-effect"></span>
                    <span class="relative z-10">About</span>
                </a>
                <a href="#footer" class="mobile-nav-item group relative w-full py-4 text-center text-lg font-bold text-white uppercase tracking-widest">
                    <span class="mobile-hover-effect"></span>
                    <span class="relative z-10">Contact</span>
                </a>
                <a href="{{ route('halaman.menu') }}" class="w-full max-w-xs">
                    <button class="w-full py-4 bg-amber-500 text-white font-black uppercase tracking-tighter rounded-xl shadow-[0_0_20px_rgba(245,158,11,0.3)]">
                        Order Now
                    </button>
                </a>
            </nav>
        </div>
    </div>
</header>

<div id="menu-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-md z-50 opacity-0 pointer-events-none transition-all duration-500 lg:hidden"></div>

<style>
    /* Desktop Underline */
    .nav-link::after {
        content: ''; position: absolute; width: 0; height: 2px; bottom: -2px; left: 0;
        background-color: #fbbf24; transition: width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .nav-link:hover::after { width: 100%; }

    /* Mobile Hover Effect */
    .mobile-hover-effect {
        position: absolute; inset: 0; border-top: 2px solid #f59e0b; border-bottom: 2px solid #f59e0b;
        transform: scale-y(2); opacity: 0; transition: all 0.3s ease;
    }
    .mobile-nav-item:hover .mobile-hover-effect { transform: scale-y(1); opacity: 1; }
    .mobile-nav-item:hover { background-color: rgba(245, 158, 11, 0.1); }

    /* Hamburger Animation */
    .btn-active #line1 { transform: translateY(10px) rotate(45deg); }
    .btn-active #line2 { opacity: 0; transform: translateX(-20px); }
    .btn-active #line3 { transform: translateY(-10px) rotate(-45deg); }

    /* Toggle State - Border dipindahkan ke sini agar hanya muncul saat terbuka */
    .menu-open {
        grid-template-rows: 1fr !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .overlay-active { opacity: 1 !important; pointer-events: auto !important; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const header = document.getElementById('main-header');
        const mobileToggle = document.getElementById('mobile-toggle');
        const menuWrapper = document.getElementById('mobile-menu-wrapper');
        const menuOverlay = document.getElementById('menu-overlay');

        const closeMenu = () => {
            mobileToggle.classList.remove('btn-active');
            menuWrapper.classList.remove('menu-open');
            menuOverlay.classList.remove('overlay-active');
        };

        mobileToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = menuWrapper.classList.contains('menu-open');
            if (isOpen) {
                closeMenu();
            } else {
                mobileToggle.classList.add('btn-active');
                menuWrapper.classList.add('menu-open');
                menuOverlay.classList.add('overlay-active');
            }
        });

        menuOverlay.addEventListener('click', closeMenu);

        window.addEventListener('scroll', () => {
            // Tutup otomatis menu saat scroll
            if (menuWrapper.classList.contains('menu-open')) {
                closeMenu();
            }

            // Efek Header saat scroll
            if (window.scrollY > 50) {
                header.classList.add('bg-black/40', 'backdrop-blur-xl', 'py-4', 'shadow-2xl');
                header.classList.remove('py-6');
            } else {
                header.classList.remove('bg-black/40', 'backdrop-blur-xl', 'py-4', 'shadow-2xl');
                header.classList.add('py-6');
            }
        }, { passive: true });

        menuWrapper.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) closeMenu();
        });
    });
</script>
    <!-- home start -->
    <section id="home"
        class="relative min-h-screen flex items-center justify-center overflow-hidden bg-[url('/images/bg.png')]">

        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-[10s] scale-105"
            style="background-image: url('{{ asset('images/bg.jpg') }}')">

            <div class="absolute inset-0 bg-black/80"></div>
        </div>
        <div class="relative z-10 container mx-auto px-4 text-center">
            <div class="max-w-4xl mx-auto">
                <p class="animate-fade-in opacity-0 font-sans text-amber-400 text-sm md:text-base tracking-[0.3em] uppercase mb-4"
                    style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                    Welcome to
                </p>

                <h1 class="animate-fade-in opacity-0 text-6xl md:text-8xl lg:text-9xl font-bold text-white mb-6 italic lobster-regular"
                    style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                    D'<span class="text-amber-400">Mario</span>
                </h1>

                <p class="animate-fade-in opacity-0 text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-10"
                    style="animation-delay: 0.6s; animation-fill-mode: forwards;">
                    Experience the finest Italian-inspired coffee and cuisine in an atmosphere of timeless elegance
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in opacity-0"
                    style="animation-delay: 0.8s; animation-fill-mode: forwards;">

                    <a href="{{ route('halaman.menu') }}"
                        class="px-8 py-4 bg-amber-500 text-black font-bold rounded-full hover:bg-amber-400 transition-all duration-300 shadow-lg hover:scale-105 active:scale-95 w-full sm:w-auto">
                        View Menu
                    </a>

                    <a href="#reservation"
                        class="px-8 py-4 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-black transition-all duration-300 w-full sm:w-auto">
                        Reserve Table
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-float">
            <a href="#bestsellers" class="text-white/50 hover:text-amber-400 transition-colors">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
        </div>

        <div class="absolute top-20 left-10 w-32 h-32 bg-amber-500/10 rounded-full blur-[80px]"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-amber-200/10 rounded-full blur-[100px]"></div>

    </section>

    <style>
        /* Custom Keyframes untuk Animasi yang Persis seperti React */

        /* 1. Fade In Up Effect */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        /* 2. Floating Indicator Effect */
        @keyframes float {

            0%,
            100% {
                transform: translate(-50%, 0);
            }

            50% {
                transform: translate(-50%, -15px);
            }
        }

        .animate-float {
            animation: float 2.5s ease-in-out infinite;
        }

        /* Khusus untuk font lobster jika belum dipasang secara global */
        .lobster-regular {
            font-family: 'Lobster', cursive;
        }
    </style>
    <!-- home end -->
    <!--best seller start-->
    <section id="bestsellers" class="py-20 bg-[#121212]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <p class="font-sans text-amber-400 text-sm tracking-[0.2em] uppercase mb-3">
                    Customer Favorites
                </p>
                <h2 class="text-4xl md:text-5xl font-bold font-playfair text-white">
                    Best Sellers
                </h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">

                <div class="product-slider" data-title="Top Foods">
                    <h3 class="text-2xl md:text-3xl font-semibold text-white font-playfair mb-6 text-center">Top Foods
                    </h3>
                    <div class="relative bg-white rounded-2xl overflow-hidden shadow-xl group">
                        <div class="slider-container relative aspect-square overflow-hidden">
                            <div class="slide absolute inset-0 transition-all duration-700 opacity-100 translate-x-0">
                                <img src="{{ asset('assets/tiramisu.jpg') }}" alt="Classic Tiramisu"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <div class="flex items-center gap-1 mb-2">
                                        <svg class="w-4 h-4 fill-amber-400 text-amber-400" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <span class="text-sm font-medium">4.9</span>
                                    </div>
                                    <h4 class="text-2xl font-semibold mb-1">Classic Tiramisu</h4>
                                    <p class="text-xl text-amber-400 font-semibold">$8.50</p>
                                </div>
                            </div>
                            <div class="slide absolute inset-0 transition-all duration-700 opacity-0 translate-x-full">
                                <img src="{{ asset('assets/croissant.jpg') }}" alt="Butter Croissant"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <div class="flex items-center gap-1 mb-2 text-amber-400"><svg
                                            class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg><span class="text-sm font-medium">4.8</span></div>
                                    <h4 class="text-2xl font-semibold mb-1">Butter Croissant</h4>
                                    <p class="text-xl text-amber-400 font-semibold">$4.50</p>
                                </div>
                            </div>
                            <div class="slide absolute inset-0 transition-all duration-700 opacity-0 translate-x-full">
                                <img src="{{ asset('assets/brownie.jpg') }}" alt="Walnut Brownie"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <div class="flex items-center gap-1 mb-2 text-amber-400"><svg
                                            class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg><span class="text-sm font-medium">4.7</span></div>
                                    <h4 class="text-2xl font-semibold mb-1">Walnut Brownie</h4>
                                    <p class="text-xl text-amber-400 font-semibold">$5.50</p>
                                </div>
                            </div>
                        </div>

                        <button
                            class="prev-btn absolute left-3 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm p-2 rounded-full hover:bg-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="next-btn absolute right-3 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm p-2 rounded-full hover:bg-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div class="dots-container absolute bottom-24 left-1/2 -translate-x-1/2 flex gap-2">
                            <button class="dot w-6 h-2 rounded-full bg-amber-500 transition-all"></button>
                            <button class="dot w-2 h-2 rounded-full bg-gray-400 transition-all"></button>
                            <button class="dot w-2 h-2 rounded-full bg-gray-400 transition-all"></button>
                        </div>
                    </div>
                </div>

                <div class="product-slider" data-title="Top Drinks">
                    <h3 class="text-2xl md:text-3xl font-semibold text-white font-playfair mb-6 text-center">Top Drinks
                    </h3>
                    <div class="relative bg-white rounded-2xl overflow-hidden shadow-xl group">
                        <div class="slider-container relative aspect-square overflow-hidden">
                            <div class="slide absolute inset-0 transition-all duration-700 opacity-100 translate-x-0">
                                <img src="{{ asset('assets/latte.jpg') }}" alt="Signature Latte"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <div class="flex items-center gap-1 mb-2 text-amber-400"><svg
                                            class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg><span class="text-sm font-medium">4.9</span></div>
                                    <h4 class="text-2xl font-semibold mb-1">Signature Latte</h4>
                                    <p class="text-xl text-amber-400 font-semibold">$5.50</p>
                                </div>
                            </div>
                            <div class="slide absolute inset-0 transition-all duration-700 opacity-0 translate-x-full">
                                <img src="{{ asset('assets/espresso.jpg') }}" alt="Espresso"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <div class="flex items-center gap-1 mb-2 text-amber-400"><svg
                                            class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg><span class="text-sm font-medium">4.8</span></div>
                                    <h4 class="text-2xl font-semibold mb-1">Italian Espresso</h4>
                                    <p class="text-xl text-amber-400 font-semibold">$3.50</p>
                                </div>
                            </div>
                            <div class="slide absolute inset-0 transition-all duration-700 opacity-0 translate-x-full">
                                <img src="{{ asset('assets/matcha.jpg') }}" alt="Matcha"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <div class="flex items-center gap-1 mb-2 text-amber-400"><svg
                                            class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg><span class="text-sm font-medium">4.7</span></div>
                                    <h4 class="text-2xl font-semibold mb-1">Matcha Latte</h4>
                                    <p class="text-xl text-amber-400 font-semibold">$6.00</p>
                                </div>
                            </div>
                        </div>

                        <button
                            class="prev-btn absolute left-3 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm p-2 rounded-full hover:bg-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="next-btn absolute right-3 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm p-2 rounded-full hover:bg-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div class="dots-container absolute bottom-24 left-1/2 -translate-x-1/2 flex gap-2">
                            <button class="dot w-6 h-2 rounded-full bg-amber-500 transition-all"></button>
                            <button class="dot w-2 h-2 rounded-full bg-gray-400 transition-all"></button>
                            <button class="dot w-2 h-2 rounded-full bg-gray-400 transition-all"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#menu"
                    class="inline-block px-8 py-3 border-2 border-amber-500 text-amber-600 font-bold rounded-lg hover:bg-amber-500 hover:text-white transition-all">
                    View Full Menu
                </a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sliders = document.querySelectorAll('.product-slider');

            sliders.forEach(slider => {
                const slides = slider.querySelectorAll('.slide');
                const dots = slider.querySelectorAll('.dot');
                const nextBtn = slider.querySelector('.next-btn');
                const prevBtn = slider.querySelector('.prev-btn');
                let currentIndex = 0;
                const totalSlides = slides.length;

                function updateSlider(newIndex) {
                    slides.forEach((slide, i) => {
                        // Reset Classes
                        slide.classList.remove('opacity-100', 'translate-x-0', 'opacity-0',
                            '-translate-x-full', 'translate-x-full');

                        if (i === newIndex) {
                            slide.classList.add('opacity-100', 'translate-x-0');
                        } else if (i < newIndex) {
                            slide.classList.add('opacity-0', '-translate-x-full');
                        } else {
                            slide.classList.add('opacity-0', 'translate-x-full');
                        }
                    });

                    // Update Dots
                    dots.forEach((dot, i) => {
                        dot.classList.remove('bg-amber-500', 'w-6', 'bg-gray-400');
                        if (i === newIndex) {
                            dot.classList.add('bg-amber-500', 'w-6');
                        } else {
                            dot.classList.add('bg-gray-400', 'w-2');
                        }
                    });

                    currentIndex = newIndex;
                }

                function nextSlide() {
                    let next = (currentIndex + 1) % totalSlides;
                    updateSlider(next);
                }

                function prevSlide() {
                    let prev = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateSlider(prev);
                }

                // Event Listeners
                nextBtn.addEventListener('click', nextSlide);
                prevBtn.addEventListener('click', prevSlide);
                dots.forEach((dot, i) => {
                    dot.addEventListener('click', () => updateSlider(i));
                });

                // Auto Play
                setInterval(nextSlide, 4000);
            });
        });
    </script>
    <!-- best seller end-->
    <!-- reservation start -->
    <section id="reservation" class="py-20 bg-[#121212] text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-12">
                <h2 class="font-serif text-5xl font-bold mb-4 italic text-[#D4A373]">D'Mario Table Reservation</h2>
                <p class="text-gray-400 font-sans tracking-widest uppercase text-xs">Choose your preferred spot on our map</p>
            </div>

            <div class="grid lg:grid-cols-4 gap-10">

                <div class="lg:col-span-3 space-y-12 bg-[#111] p-6 md:p-10 rounded-[3rem] border border-white/5 shadow-2xl relative overflow-hidden">

                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <span class="text-[#D4A373] font-serif italic text-lg whitespace-nowrap">VIP Private Rooms</span>
                            <div class="h-px bg-[#D4A373]/20 w-full"></div>
                        </div>
                        <div class="grid grid-cols-4 gap-4">
                            @foreach (range(1, 4) as $vip)
                                <button type="button" onclick="selectTable('VIP-{{ $vip }}')"
                                    id="btn-VIP-{{ $vip }}"
                                    class="table-btn aspect-video rounded-2xl border-2 border-[#D4A373]/30 bg-[#D4A373]/5 flex flex-col items-center justify-center transition-all hover:scale-105">
                                    <span class="text-[8px] uppercase tracking-widest opacity-70">Room</span>
                                    <span class="text-xl font-bold">V-{{ $vip }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-10">
                        <div class="md:col-span-1 space-y-4">
                            <h4 class="text-center text-[10px] tracking-[0.3em] text-gray-500 uppercase">Bar Area</h4>
                            <div class="grid grid-cols-2 gap-3 bg-[#0A0A0A] p-4 rounded-3xl border border-white/5">
                                @foreach (range(5, 10) as $bar)
                                    <button type="button" onclick="selectTable('{{ $bar }}')"
                                        id="btn-{{ $bar }}"
                                        class="table-btn aspect-square rounded-xl border border-white/10 bg-white/5 flex items-center justify-center hover:border-[#D4A373] transition-all">
                                        <span class="font-bold">{{ $bar }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="md:col-span-2 space-y-4">
                            <h4 class="text-center text-[10px] tracking-[0.3em] text-gray-500 uppercase">Main Dining Hall</h4>
                            <div class="grid grid-cols-4 gap-3">
                                @foreach (range(11, 22) as $main)
                                    <button type="button" onclick="selectTable('{{ $main }}')"
                                        id="btn-{{ $main }}"
                                        class="table-btn aspect-square rounded-xl border border-white/10 bg-white/5 flex items-center justify-center hover:border-[#D4A373] transition-all">
                                        <span class="font-bold">{{ $main }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/5 space-y-4">
                        <div class="flex items-center justify-between">
                            <h4 class="text-[10px] tracking-[0.3em] text-sky-500 uppercase">Beach Side Terrace</h4>
                            <div class="h-px bg-sky-500/20 grow mx-4"></div>
                            <i data-lucide="waves" class="text-sky-500"></i>
                        </div>
                        <div class="grid grid-cols-4 md:grid-cols-8 gap-3">
                            @foreach (range(23, 30) as $beach)
                                <button type="button" onclick="selectTable('{{ $beach }}')"
                                    id="btn-{{ $beach }}"
                                    class="table-btn h-16 rounded-xl border border-sky-500/20 bg-sky-500/5 flex items-center justify-center hover:bg-sky-500 hover:text-black transition-all">
                                    <span class="font-bold text-sm">{{ $beach }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-[#141414] p-8 rounded-[2.5rem] border border-white/5 sticky top-10 shadow-2xl">
                        <h3 class="font-serif text-2xl mb-8">Reservation</h3>

                        <div class="space-y-6">
                            <div class="p-4 bg-[#0A0A0A] rounded-2xl border border-[#D4A373]/20 border-dashed">
                                <p class="text-[10px] text-gray-500 uppercase mb-1">Selected Location</p>
                                <p id="selected_display" class="text-xl font-bold text-[#D4A373]">Not selected</p>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="text-[10px] text-gray-500 uppercase ml-1 font-bold">Full Name</label>
                                    <input type="text" id="res_name" placeholder="Enter your full name"
                                        class="w-full bg-[#0A0A0A] border border-white/10 rounded-xl p-4 text-sm outline-none focus:ring-1 focus:ring-[#D4A373] mt-1 placeholder:text-gray-700">
                                </div>

                                <div>
                                    <label class="text-[10px] text-gray-500 uppercase ml-1 font-bold">Number Of Guests</label>
                                    <div class="flex items-center justify-between bg-[#0A0A0A] p-2 rounded-xl mt-1 border border-white/5">
                                        <button onclick="changeGuest(-1)" type="button" class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-white/5 text-[#D4A373]">
                                            <i data-lucide="minus" size="18"></i>
                                        </button>
                                        <span id="guest_val" class="font-bold text-lg">2</span>
                                        <button onclick="changeGuest(1)" type="button" class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-white/5 text-[#D4A373]">
                                            <i data-lucide="plus" size="18"></i>
                                        </button>
                                    </div>
                                </div>

                                <input type="date" id="res_date" class="w-full bg-[#0A0A0A] border border-white/10 rounded-xl p-4 text-sm outline-none focus:ring-1 focus:ring-[#D4A373] scheme-dark">
                                <input type="time" id="res_time" class="w-full bg-[#0A0A0A] border border-white/10 rounded-xl p-4 text-sm outline-none focus:ring-1 focus:ring-[#D4A373] scheme-dark">

                                <textarea id="res_notes" placeholder="Special requests (Birthday, Allergies, etc.)"
                                    class="w-full bg-[#0A0A0A] border border-white/10 rounded-xl p-4 text-sm outline-none focus:ring-1 focus:ring-[#D4A373] resize-none h-24"></textarea>
                            </div>

                            <button onclick="sendToWhatsApp()"
                                class="w-full bg-[#D4A373] hover:bg-[#c59262] text-black font-extrabold py-5 rounded-2xl transition-all flex flex-col items-center justify-center gap-1 group">
                                <span class="uppercase tracking-widest text-xs font-black">Reserve Table</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

    let selectedTable = null;
    let guests = 2;

    function changeGuest(v) {
        if (guests + v >= 1 && guests + v <= 50) {
            guests += v;
            document.getElementById('guest_val').innerText = guests;
        }
    }

    function selectTable(id) {
        // Reset visual semua tombol
        document.querySelectorAll('.table-btn').forEach(btn => {
            btn.classList.remove('bg-[#D4A373]', 'text-black', 'ring-2', 'ring-[#D4A373]', 'scale-105');
        });

        // Highlight meja terpilih
        selectedTable = id;
        const activeBtn = document.getElementById(`btn-${id}`);
        if(activeBtn) {
            activeBtn.classList.add('bg-[#D4A373]', 'text-black', 'ring-2', 'ring-[#D4A373]', 'scale-105');
        }

        // Update tampilan teks area
        const areaName = id.includes('VIP') ? 'VIP Room' : (parseInt(id) >= 23 ? 'Beach Side' : 'Main Area');
        document.getElementById('selected_display').innerText = `${areaName} #${id}`;
    }

    function sendToWhatsApp() {
        // Ambil value dari input termasuk field nama yang baru
        const name = document.getElementById('res_name').value;
        const date = document.getElementById('res_date').value;
        const time = document.getElementById('res_time').value;
        const notes = document.getElementById('res_notes').value;
        const adminPhone = "6281268769120";

        // Validasi agar semua wajib diisi
        if (!name || !selectedTable || !date || !time) {
            alert("Please complete your Name, Table selection, Date, and Time!");
            return;
        }

        // Format pesan WhatsApp dengan nama orangnya
        const msg = `*D'MARIO CAFE - RESERVATION*%0A` +
            `-----------------------------------%0A` +
            `*Name:* ${name}%0A` +
            `*Table:* ${selectedTable}%0A` +
            `*Guests:* ${guests} People%0A` +
            `*Date:* ${date}%0A` +
            `*Time:* ${time}%0A` +
            `*Requests:* ${notes || '-'}%0A` +
            `-----------------------------------%0A` +
            `_Please let me know if this booking is confirmed._`;

        window.open(`https://wa.me/${adminPhone}?text=${msg}`, '_blank');
    }
</script>
    <!-- reservation end-->
    <!-- about us start -->
    <section id="about" class="py-20 bg-[#121212]">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div>
                    <p class="font-sans text-[#D4A373] text-sm tracking-[0.2em] uppercase mb-3">
                        Our Story
                    </p>
                    <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6">
                        A Legacy of <span class="text-[#D4A373] italic">Excellence</span>
                    </h2>
                    <div class="space-y-4 font-sans text-gray-400">
                        <p>
                            Founded in the heart of the city, D'Mario Cafe brings the authentic taste of Italian
                            coffee culture to every cup. Our passion for quality began with a simple dream: to
                            create a space where exceptional coffee meets warm hospitality.
                        </p>
                        <p>
                            Every bean is carefully selected, every pastry lovingly crafted, and every guest
                            treated like family. We believe that great coffee is more than just a drink—it's
                            an experience that brings people together.
                        </p>
                        <p>
                            From our signature lattes to our freshly baked croissants, every item on our menu
                            represents our commitment to excellence and our love for the art of café culture.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @php
                        $features = [
                            [
                                'icon' => 'coffee',
                                'title' => 'Premium Beans',
                                'desc' => 'Sourced from the finest Italian roasters',
                            ],
                            [
                                'icon' => 'award',
                                'title' => 'Award Winning',
                                'desc' => 'Recognized for excellence in taste and service',
                            ],
                            [
                                'icon' => 'heart',
                                'title' => 'Made with Love',
                                'desc' => 'Every dish crafted with passion and care',
                            ],
                            [
                                'icon' => 'clock',
                                'title' => 'Fresh Daily',
                                'desc' => 'Baked and brewed fresh every morning',
                            ],
                        ];
                    @endphp

                    @foreach ($features as $index => $feature)
                        <div class="bg-[#1A1A1A] rounded-xl p-6 shadow-lg hover:shadow-[#D4A373]/20 transition-all duration-300 hover:-translate-y-1 border border-white/5"
                            style="transition-delay: {{ $index * 100 }}ms">
                            <div class="w-12 h-12 bg-[#2A2A2A] rounded-lg flex items-center justify-center mb-4">
                                @if ($feature['icon'] == 'coffee')
                                    <i data-lucide="coffee" class="text-[#D4A373]"></i>
                                @elseif($feature['icon'] == 'award')
                                    <i data-lucide="award" class="text-[#D4A373]"></i>
                                @elseif($feature['icon'] == 'heart')
                                    <i data-lucide="heart" class="text-[#D4A373]"></i>
                                @elseif($feature['icon'] == 'clock')
                                    <i data-lucide="clock" class="text-[#D4A373]"></i>
                                @endif
                            </div>

                            <h3 class="font-serif text-lg font-semibold text-white mb-2">
                                {{ $feature['title'] }}
                            </h3>
                            <p class="font-sans text-sm text-gray-400">
                                {{ $feature['desc'] }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
    <!-- about us end -->
    <!-- JS untuk Navbar + Cart & Loyalty yang sudah ada -->
    <script>
        // Navbar Mobile Toggle
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobilePanel = mobileMenu.querySelector('div');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            const lines = hamburger.querySelectorAll('span');
            lines[0].classList.toggle('rotate-45');
            lines[0].classList.toggle('translate-y-2.5');
            lines[1].classList.toggle('scale-0');
            lines[2].classList.toggle('-rotate-45');
            lines[2].classList.toggle('-translate-y-2.5');

            if (!mobileMenu.classList.contains('hidden')) {
                mobilePanel.classList.remove('translate-x-full');
                mobilePanel.classList.add('translate-x-0');
            } else {
                mobilePanel.classList.remove('translate-x-0');
                mobilePanel.classList.add('translate-x-full');
            }
        });

        // Close when click overlay
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                hamburger.click();
            }
        });

        // Script cart & loyalty Anda yang lama (tetap copy-paste di sini)
        let carts = {
            food: [],
            drink: []
        };

        function addToCart(type, item, price) {
            carts[type].push({
                item,
                price
            });
            updateCart(type);
        }

        function updateCart(type) {
            const cartList = document.getElementById(`${type}-cart`);
            cartList.innerHTML = '';
            carts[type].forEach(i => {
                const li = document.createElement('li');
                li.textContent = `${i.item} - $${i.price}`;
                cartList.appendChild(li);
            });
        }

        function purchase(type) {
            if (carts[type].length > 0) {
                fetch('{{ route('purchase') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                carts[type] = [];
                updateCart(type);
                alert('Purchase successful!');
            }
        }

        function calculatePoints() {
            const amount = parseFloat(document.getElementById('purchaseAmount').value);
            const points = Math.floor(amount / 10);
            document.getElementById('pointsResult').textContent = `You earned ${points} points!`;
        }
    </script>

    <!-- Swiper JS (pastikan di-load setelah body) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 3000
            },
            pagination: {
                el: '.swiper-pagination'
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
        });
    </script>
    <footer id ="footer" class="bg-neutral-950 text-neutral-300 pt-16 pb-8 border-t border-white/5">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

                <div class="space-y-6">
                    <h2 class="text-3xl font-serif italic tracking-wider text-white">D'Mario</h2>
                    <p class="text-sm leading-relaxed text-neutral-400">
                        Crafting moments and brewing memories since 2010. Experience the finest artisan coffee and
                        gourmet bites in a cozy, industrial-chic atmosphere.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-amber-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-amber-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-amber-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-semibold uppercase tracking-widest text-sm mb-6">Explore</h4>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#" class="hover:text-amber-500 transition-colors">Our Menu</a></li>
                        <li><a href="#" class="hover:text-amber-500 transition-colors">Private Events</a></li>
                        <li><a href="#" class="hover:text-amber-500 transition-colors">Coffee Beans
                                Subscription</a></li>
                        <li><a href="#" class="hover:text-amber-500 transition-colors">Join the Team</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold uppercase tracking-widest text-sm mb-6">Find Us</h4>
                    <div class="space-y-4 text-sm">
                        <p class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-amber-600"></i>
                            <span>123 Espresso Street, <br> Downtown District, NY 10001</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-amber-600"></i>
                            <a href="tel:+62123456789" class="hover:text-white transition-colors">+62 123 4567 89</a>
                        </p>
                        <p class="flex items-center">
                            <i class="fab fa-whatsapp mr-3 text-amber-600"></i>
                            <a href="https://wa.me/62123456789" class="hover:text-white transition-colors">WhatsApp
                                Chat</a>
                        </p>
                    </div>
                </div>

                <div class="bg-white/5 p-6 rounded-2xl border border-white/10">
                    <h4 class="text-white font-semibold uppercase tracking-widest text-sm mb-4">Opening Hours</h4>
                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between border-b border-white/10 pb-2">
                            <span>Mon - Thu</span>
                            <span class="text-white">09:00 AM - 10:00 PM</span>
                        </div>
                        <div class="flex justify-between border-b border-white/10 pb-2">
                            <span>Fri - Sat</span>
                            <span class="text-white">09:00 AM - 12:00 AM</span>
                        </div>
                        <div class="flex justify-between text-amber-500 font-bold">
                            <span>Sunday</span>
                            <span>07:00 AM - 11:00 PM</span>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-xs text-neutral-500">
                <p>&copy; <span id="year"></span> D'Mario Cafe. All Rights Reserved.</p>
                <div class="mt-4 md:mt-0">
                    <p class="italic">"Where every cup tells a story."</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Dinamis Year untuk Copyright
        document.getElementById('year').textContent = new Date().getFullYear();

        // Opsional: Logika Interaktif sederhana (Hover effect via JS jika ingin lebih kompleks)
        // Contoh: Smooth scroll ke top atau tracking klik sosmed
    </script>

</body>

</html>
