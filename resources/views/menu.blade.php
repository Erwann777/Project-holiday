<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Mario Cafe Shop | Premium Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,700&family=Lobster&family=Inter:wght@300;400;600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --amber: #f59e0b;
        }

        body {
            background-color: #000;
            color: #fff;
            font-family: 'Inter', sans-serif;
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .lobster-regular {
            font-family: "Lobster", sans-serif;
        }

        /* Unified Navbar Spacing */
        header {
            height: 70px;
        }

        .sub-nav {
            height: 50px;
            top: 70px;
        }

        /* Adjusted scroll margin */
        section {
            scroll-margin-top: 130px;
        }

        .line {
            height: 2px;
            width: 30px;
            background-color: white;
            display: block;
            transition: all 0.3s ease;
        }

        .btn-active .line:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .btn-active .line:nth-child(2) {
            opacity: 0;
        }

        .btn-active .line:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        .menu-card {
            background: #0a0a0a;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            height: 100%;
        }

        .menu-card:hover {
            border-color: var(--amber);
            transform: translateY(-4px);
        }

        .menu-card-img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .cart-bar {
            background: rgba(10, 10, 10, 0.95);
            backdrop-blur: 20px;
            border-top: 1px solid rgba(245, 158, 11, 0.3);
            transform: translateY(100%);
            transition: 0.5s ease;
        }

        .cart-bar.active {
            transform: translateY(0);
        }

        .pay-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
            cursor: pointer;
        }

        .pay-card.selected {
            background: rgba(245, 158, 11, 0.15);
            border-color: var(--amber);
        }

        #receipt-capture {
            background: #fff;
            color: #000;
            padding: 30px;
            width: 100%;
            max-width: 350px;
            font-family: 'Courier New', monospace;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Search highlight glow */
        .search-highlight {
            border: 3px solid var(--amber) !important;
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.6);
            animation: glowPulse 2s ease-in-out infinite alternate;
        }

        @keyframes glowPulse {
            from {
                box-shadow: 0 0 20px rgba(245, 158, 11, 0.6);
            }

            to {
                box-shadow: 0 0 30px rgba(245, 158, 11, 0.9);
            }
        }
    </style>
</head>

<body class="h-full">
    <header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent py-2">
    <div class="container-fluid mx-auto px-6 md:px-14 flex items-center justify-between">
        <a href="#home" class="flex pb-2">
            <h1 class="text-4xl lobster-regular italic tracking-wide text-white">
                D'<span class="text-amber-300">Mario</span>
            </h1>
        </a>

        <nav class="hidden lg:flex items-center space-x-10 text-lg font-playfair text-bold">
            <a href="{{ route('halaman.home') }}" class="nav-link text-white font-medium relative py-1">Home</a>
            <a href="{{ route('halaman.menu') }}" class="nav-link text-white font-medium relative py-1">Menu</a>
            <a href="{{ route('halaman.home') }}#bestsellers" class="nav-link text-white font-medium relative py-1">Best Sellers</a>
            <a href="{{ route('halaman.home') }}#about" class="nav-link text-white font-medium relative py-1">About</a>
            <a href="{{ route('halaman.home') }}#footer" class="nav-link text-white font-medium relative py-1">Contact</a>
        </nav>

        <button id="mobile-toggle" class="lg:hidden text-white focus:outline-none relative w-12 h-12 flex items-center justify-center z-[60]">
            <div class="relative w-7 h-5">
                <span id="line1" class="absolute block w-full h-0.5 bg-current transition-all duration-500 top-0"></span>
                <span id="line2" class="absolute block w-full h-0.5 bg-current transition-all duration-500 top-[9px]"></span>
                <span id="line3" class="absolute block w-full h-0.5 bg-current transition-all duration-500 top-[18px]"></span>
            </div>
        </button>
    </div>
</header>

<div id="sub-nav" class="sub-nav fixed left-0 right-0 z-40 bg-transparent border-white/10 flex items-center transition-all duration-500 h-16">
    <div class="container mx-auto px-4 md:px-6 flex items-center justify-between w-full relative">

        <div class="flex items-center gap-1 md:gap-4 text-gray-400">
            <a href="#food-sec" class="sub-nav-pill group">
                <div class="pill-bg"></div>
                <i class="fas fa-utensils text-base md:text-lg group-hover:text-amber-500 transition-all z-10"></i>
                <span class="text-[8px] md:text-[9px] font-bold uppercase mt-1 z-10">Foods</span>
            </a>
            <a href="#drink-sec" class="sub-nav-pill group">
                <div class="pill-bg"></div>
                <i class="fas fa-coffee text-base md:text-lg group-hover:text-amber-500 transition-all z-10"></i>
                <span class="text-[8px] md:text-[9px] font-bold uppercase mt-1 z-10">Drinks</span>
            </a>
            <a href="#dessert-sec" class="sub-nav-pill group">
                <div class="pill-bg"></div>
                <i class="fas fa-cake-candles text-base md:text-lg group-hover:text-amber-500 transition-all z-10"></i>
                <span class="text-[8px] md:text-[9px] font-bold uppercase mt-1 z-10">Desserts</span>
            </a>
        </div>

        <div class="relative flex-1 max-w-[130px] md:max-w-[200px] ml-2">
            <input type="text" id="menu-search" placeholder="Search..."
                class="w-full bg-white/5 border border-white/10 rounded-full px-3 py-1.5 pr-8 text-[10px] md:text-xs text-white outline-none focus:border-amber-500 transition-all">
            <i class="fas fa-search absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 text-[10px]"></i>
        </div>

        <div id="mobile-menu-wrapper" class="absolute top-16 left-0 right-0 grid grid-rows-[0fr] transition-[grid-template-rows] duration-500 lg:hidden bg-black/95 backdrop-blur-2xl border-white/10 overflow-hidden">
            <div class="overflow-hidden">
                <nav class="container mx-auto px-8 py-10 flex flex-col items-center justify-center text-center space-y-4 font-playfair">
                    <a href="{{ route('halaman.home') }}" class="mobile-nav-item group">
                        <span class="box-glow"></span><span class="box-bg"></span>
                        <span class="relative z-10">Home</span>
                    </a>
                    <a href="{{ route('halaman.menu') }}" class="mobile-nav-item group">
                        <span class="box-glow"></span><span class="box-bg"></span>
                        <span class="relative z-10">Menu</span>
                    </a>
                    <a href="{{ route('halaman.home') }}#bestsellers" class="mobile-nav-item group">
                        <span class="box-glow"></span><span class="box-bg"></span>
                        <span class="relative z-10">Best Sellers</span>
                    </a>
                    <a href="{{ route('halaman.home') }}#about" class="mobile-nav-item group">
                        <span class="box-glow"></span><span class="box-bg"></span>
                        <span class="relative z-10">About</span>
                    </a>
                    <a href="{{ route('halaman.home') }}#footer" class="mobile-nav-item group">
                        <span class="box-glow"></span><span class="box-bg"></span>
                        <span class="relative z-10">Contact</span>
                    </a>

                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    /* Desktop Underline */
    .nav-link::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -2px; left: 0; background-color: #fbbf24; transition: width 0.4s ease; }
    .nav-link:hover::after { width: 100%; }

    /* Mobile Item Hover (Box Glow) */
    .mobile-nav-item { position: relative; width: 100%; text-center; font-weight: 700; color: white; text-transform: uppercase; letter-spacing: 0.1em; padding: 1rem 0; display: block; }
    .box-glow { position: absolute; inset: 0; border-top: 2px solid #f59e0b; border-bottom: 2px solid #f59e0b; transform: scale-y(2); opacity: 0; transition: 0.3s ease; }
    .box-bg { position: absolute; inset: 0; background-color: rgba(245, 158, 11, 0.2); transform: scale(0); opacity: 0; transition: 0.3s ease; z-index: -1; }
    .mobile-nav-item:hover .box-glow { transform: scale-y(1); opacity: 1; }
    .mobile-nav-item:hover .box-bg { transform: scale(1); opacity: 1; }

    /* Sub-Nav Pill */
    .sub-nav-pill { position: relative; padding: 0.4rem 0.8rem; display: flex; flex-direction: column; align-items: center; }
    .pill-bg { position: absolute; inset: 0; background-color: rgba(245, 158, 11, 0.15); border-radius: 12px; transform: scale(0.7); opacity: 0; transition: 0.3s ease; }
    .sub-nav-pill:hover .pill-bg { transform: scale(1); opacity: 1; }

    /* Hamburger Animation (Rapi) */
    .btn-active #line1 { transform: translateY(9px) rotate(45deg); }
    .btn-active #line2 { opacity: 0; transform: translateX(-10px); }
    .btn-active #line3 { transform: translateY(-9px) rotate(-45deg); }

    .menu-open { grid-template-rows: 1fr !important; }
    .backdrop-blur-md { -webkit-backdrop-filter: blur(12px); backdrop-filter: blur(12px); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const header = document.getElementById('main-header');
        const subNav = document.getElementById('sub-nav');
        const mobileToggle = document.getElementById('mobile-toggle');
        const menuWrapper = document.getElementById('mobile-menu-wrapper');

        const closeMenu = () => {
            mobileToggle.classList.remove('btn-active');
            menuWrapper.classList.remove('menu-open');
        };

        // 1. Toggle Menu
        mobileToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            mobileToggle.classList.toggle('btn-active');
            menuWrapper.classList.toggle('menu-open');
        });

        // 2. Close when clicking outside
        document.addEventListener('click', (e) => {
            if (!menuWrapper.contains(e.target) && !mobileToggle.contains(e.target)) {
                closeMenu();
            }
        });

        // 3. Close on scroll & Handle Nav Swap
        window.addEventListener('scroll', () => {
            // Auto close menu on scroll
            if (menuWrapper.classList.contains('menu-open')) {
                closeMenu();
            }

            // Header Swap Logic
            const h = header.offsetHeight;
            if (window.scrollY > 80) {
                header.style.transform = 'translateY(-100%)';
                header.style.opacity = '0';
                subNav.style.top = '0';
                subNav.classList.add('bg-black/20', 'backdrop-blur-md', 'shadow-xl');
            } else {
                header.style.transform = 'translateY(0)';
                header.style.opacity = '1';
                subNav.style.top = `${h}px`;
                subNav.classList.remove('bg-black/20', 'backdrop-blur-md', 'shadow-xl');
            }
        });

        window.addEventListener('resize', () => {
            subNav.style.top = `${header.offsetHeight}px`;
            closeMenu();
        });
    });
</script>

    <main class="container mx-auto px-4 pt-36 mt-20 pb-32 space-y-16">
        <section id="food-sec">
            <h2 class="text-xl font-playfair italic mb-6 border-l-4 border-amber-500 pl-3 uppercase tracking-widest">
                Foods</h2>
            <div id="food-grid"
                class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3"></div>
        </section>
        <section id="drink-sec">
            <h2 class="text-xl font-playfair italic mb-6 border-l-4 border-amber-500 pl-3 uppercase tracking-widest">
                Drinks</h2>
            <div id="drink-grid"
                class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3"></div>
        </section>
        <section id="dessert-sec">
            <h2 class="text-xl font-playfair italic mb-6 border-l-4 border-amber-500 pl-3 uppercase tracking-widest">
                Desserts</h2>
            <div id="dessert-grid"
                class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3"></div>
        </section>
    </main>

    <div id="cart-bar" class="cart-bar fixed bottom-0 left-0 right-0 z-50 p-4">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <div id="cart-bubbles" class="flex gap-2 overflow-x-auto w-full"></div>
            <div class="flex items-center gap-6 shrink-0">
                <div class="text-right">
                    <p id="total-val" class="text-xl font-black text-amber-500 leading-none">Rp 0</p>
                </div>
                <button onclick="openCheckout()"
                    class="bg-amber-500 text-black px-6 py-3 rounded-lg font-black uppercase text-xs">Checkout</button>
            </div>
        </div>
    </div>

    <div id="checkout-modal" class="fixed inset-0 z-[60] hidden bg-black/95 flex items-center justify-center p-4">
        <div
            class="bg-[#0a0a0a] w-full max-w-4xl rounded-2xl border border-white/10 overflow-hidden flex flex-col lg:flex-row shadow-2xl">
            <div class="flex-1 p-8 overflow-y-auto max-h-[45vh] lg:max-h-[80vh]">
                <h3 class="text-2xl font-playfair italic text-amber-500 mb-6">Review Order</h3>
                <div id="checkout-list" class="space-y-4"></div>
            </div>
            <div class="w-full lg:w-[340px] bg-white/[0.02] border-l border-white/5 p-8 flex flex-col">
                <label class="text-xs uppercase font-black text-amber-500 mb-2">Table Number</label>
                <input id="table-number" type="text" placeholder="example: 8"
                    class="w-full bg-black border border-white/10 rounded-lg px-4 py-3 mb-6 outline-none focus:border-amber-500 text-white">
                <h4 class="text-xs uppercase font-black mb-4 text-amber-500">Payment</h4>
                <div class="space-y-2 mb-8">
                    <div onclick="selectPay('Cash', this)"
                        class="pay-card p-4 rounded-xl flex items-center gap-3 text-xs font-bold uppercase"><i
                            class="fas fa-money-bill-wave text-green-500"></i> Cash</div>
                    <div onclick="selectPay('Bank Transfer', this)"
                        class="pay-card p-4 rounded-xl flex items-center gap-3 text-xs font-bold uppercase"><i
                            class="fas fa-university text-blue-500"></i> Bank Transfer</div>
                    <div onclick="selectPay('QRIS', this)"
                        class="pay-card p-4 rounded-xl flex items-center gap-3 text-xs font-bold uppercase"><i
                            class="fas fa-qrcode text-purple-500"></i> QRIS</div>
                </div>
                <button onclick="confirmOrder()"
                    class="w-full bg-amber-500 text-black py-4 rounded-xl font-black uppercase text-xs">Confirm
                    Order</button>
                <button onclick="closeCheckout()"
                    class="mt-4 text-xs text-gray-500 underline text-center w-full">Cancel</button>
            </div>
        </div>
    </div>

    <div id="receipt-screen"
        class="fixed inset-0 z-[70] hidden bg-black/95 flex flex-col items-center justify-center p-4">
        <div id="receipt-capture">
            <div class="text-center border-b border-black pb-4 mb-4">
                <h2 class="text-2xl font-lobster">D'Mario</h2>
                <p id="r-time" class="text-[9px] mt-1"></p>
                <p class="font-bold text-sm mt-2">Table: <span id="r-table"></span></p>
            </div>
            <div id="r-items" class="text-[11px] space-y-2 mb-4"></div>
            <div class="border-t border-black pt-2 flex justify-between font-black text-sm">
                <span>TOTAL</span><span id="r-total"></span>
            </div>
            <div id="bank-details" class="hidden mt-4 pt-2 border-t border-black text-[10px]">
                <p class="font-bold">BANK TRANSFER:</p>
                <p>BCA: 098-765-4321</p>
                <p>A/N: D'MARIO CAFE</p>
            </div>
            <p class="text-[10px] mt-6 italic text-center">Payment: <span id="r-method"></span></p>
        </div>
        <div class="mt-8 flex gap-4">
            <button onclick="downloadReceipt()"
                class="bg-amber-500 text-black px-6 py-3 rounded-lg font-bold text-xs uppercase">Save PNG</button>
            <button onclick="location.reload()"
                class="bg-white/10 text-white px-6 py-3 rounded-lg font-bold text-xs uppercase">Close</button>
        </div>
    </div>

    <script>
        const menuData = {
            food: [{
                    id: 1,
                    name: "Gold Wagyu Steak",
                    price: 450000,
                    desc: "24k edible gold leaf over premium A5 Wagyu.",
                    img: "https://images.unsplash.com/photo-1546241072-48010ad28c2c?q=80&w=400"
                },
                {
                    id: 2,
                    name: "Truffle Pasta",
                    price: 110000,
                    desc: "Creamy black truffle tagliatelle with parmesan.",
                    img: "https://images.unsplash.com/photo-1476124369491-e7addf5db371?q=80&w=400"
                },
                {
                    id: 3,
                    name: "Atlantic Salmon",
                    price: 155000,
                    desc: "Pan-seared salmon with lemon butter sauce.",
                    img: "https://images.unsplash.com/photo-1467003909585-2f8a72700288?q=80&w=400"
                },
                {
                    id: 4,
                    name: "Lobster Thermidor",
                    price: 380000,
                    desc: "Baked lobster in rich creamy brandy sauce.",
                    img: "https://images.unsplash.com/photo-1559742811-824289524599?q=80&w=400"
                },
                {
                    id: 5,
                    name: "Duck Confit",
                    price: 145000,
                    desc: "Crispy skin duck leg with berry reduction.",
                    img: "https://images.unsplash.com/photo-1514516313544-7b3a19714f3c?q=80&w=400"
                },
                {
                    id: 6,
                    name: "Saffron Risotto",
                    price: 95000,
                    desc: "Italian arborio rice cooked with premium saffron.",
                    img: "https://images.unsplash.com/photo-1476124369491-e7addf5db371?q=80&w=400"
                },
                {
                    id: 7,
                    name: "Beef Wellington",
                    price: 285000,
                    desc: "Pastry-wrapped beef tenderloin and mushroom.",
                    img: "https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=400"
                },
                {
                    id: 8,
                    name: "Garlic Prawns",
                    price: 125000,
                    desc: "Giant king prawns sautéed in garlic and chili.",
                    img: "https://images.unsplash.com/photo-1559742811-824289524599?q=80&w=400"
                },
                {
                    id: 9,
                    name: "Lamb Rack",
                    price: 220000,
                    desc: "Herb-crusted lamb with mashed potatoes.",
                    img: "https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=400"
                },
                {
                    id: 10,
                    name: "Chicken Marsala",
                    price: 85000,
                    desc: "Chicken breast in mushroom wine sauce.",
                    img: "https://images.unsplash.com/photo-1514516313544-7b3a19714f3c?q=80&w=400"
                }
            ],
            drink: [{
                    id: 11,
                    name: "Gold Latte",
                    price: 65000,
                    desc: "Signature coffee topped with real gold flakes.",
                    img: "https://images.unsplash.com/photo-1510707577719-af7c184f74df?q=80&w=400"
                },
                {
                    id: 12,
                    name: "Blue Lagoon",
                    price: 45000,
                    desc: "Refreshing citrus mocktail with blue curaçao.",
                    img: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?q=80&w=400"
                },
                {
                    id: 13,
                    name: "Matcha Zen",
                    price: 52000,
                    desc: "Ceremonial Japanese matcha with oat milk.",
                    img: "https://images.unsplash.com/photo-1515823064-d6e0c04616a7?q=80&w=400"
                },
                {
                    id: 14,
                    name: "Berry Burst",
                    price: 48000,
                    desc: "Fresh mixed berries blended with honey.",
                    img: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?q=80&w=400"
                },
                {
                    id: 15,
                    name: "Classic Mojito",
                    price: 55000,
                    desc: "Fresh mint, lime, and soda water.",
                    img: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?q=80&w=400"
                },
                {
                    id: 16,
                    name: "Iced V60",
                    price: 40000,
                    desc: "Single origin specialty coffee drip.",
                    img: "https://images.unsplash.com/photo-1510707577719-af7c184f74df?q=80&w=400"
                },
                {
                    id: 17,
                    name: "Rose Tea",
                    price: 38000,
                    desc: "Premium dried rose buds hot infusion.",
                    img: "https://images.unsplash.com/photo-1515823064-d6e0c04616a7?q=80&w=400"
                },
                {
                    id: 18,
                    name: "Vanilla Frappe",
                    price: 58000,
                    desc: "Blended cream with vanilla bean pod.",
                    img: "https://images.unsplash.com/photo-1510707577719-af7c184f74df?q=80&w=400"
                },
                {
                    id: 19,
                    name: "Mango Tango",
                    price: 46000,
                    desc: "Fresh Harum Manis mango puree.",
                    img: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?q=80&w=400"
                },
                {
                    id: 20,
                    name: "Affogato",
                    price: 45000,
                    desc: "Espresso shot over vanilla gelato.",
                    img: "https://images.unsplash.com/photo-1510707577719-af7c184f74df?q=80&w=400"
                }
            ],
            dessert: [{
                    id: 21,
                    name: "Tiramisu",
                    price: 75000,
                    desc: "Traditional Italian pick-me-up with mascarpone.",
                    img: "https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?q=80&w=400"
                },
                {
                    id: 22,
                    name: "Chocolate Lava",
                    price: 65000,
                    desc: "Warm melting chocolate heart with gelato.",
                    img: "https://images.unsplash.com/photo-1624353365286-3f8d62daad51?q=80&w=400"
                },
                {
                    id: 23,
                    name: "Macaron Set",
                    price: 90000,
                    desc: "Box of 6 premium French macarons.",
                    img: "https://images.unsplash.com/photo-1558326567-98ae2405596b?q=80&w=400"
                },
                {
                    id: 24,
                    name: "New York Cheese",
                    price: 55000,
                    desc: "Dense cheesecake with graham cracker crust.",
                    img: "https://images.unsplash.com/photo-1533134242443-d4fd215305ad?q=80&w=400"
                },
                {
                    id: 25,
                    name: "Creme Brulee",
                    price: 48000,
                    desc: "Vanilla custard with burnt sugar top.",
                    img: "https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?q=80&w=400"
                },
                {
                    id: 26,
                    name: "Panna Cotta",
                    price: 45000,
                    desc: "Cooked cream with strawberry coulis.",
                    img: "https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?q=80&w=400"
                },
                {
                    id: 27,
                    name: "Berry Tart",
                    price: 52000,
                    desc: "Sweet crust with pastry cream and fruit.",
                    img: "https://images.unsplash.com/photo-1533134242443-d4fd215305ad?q=80&w=400"
                },
                {
                    id: 28,
                    name: "Opera Cake",
                    price: 68000,
                    desc: "Layers of coffee, ganache, and almond sponge.",
                    img: "https://images.unsplash.com/photo-1624353365286-3f8d62daad51?q=80&w=400"
                },
                {
                    id: 29,
                    name: "Red Velvet",
                    price: 58000,
                    desc: "Crimson cake with cream cheese frosting.",
                    img: "https://images.unsplash.com/photo-1533134242443-d4fd215305ad?q=80&w=400"
                },
                {
                    id: 30,
                    name: "Lemon Meringue",
                    price: 50000,
                    desc: "Tangy lemon curd with fluffy toasted top.",
                    img: "https://images.unsplash.com/photo-1558326567-98ae2405596b?q=80&w=400"
                }
            ]
        };

        let cart = [];
        let selectedMethod = "";

        function render() {
            ['food', 'drink', 'dessert'].forEach(cat => {
                const grid = document.getElementById(`${cat}-grid`);
                grid.innerHTML = menuData[cat].map(item => `
                    <div class="menu-card" data-name="${item.name.toLowerCase()}">
                        <img src="${item.img}" class="menu-card-img">
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="mb-3">
                                <h3 class="text-md font-bold uppercase truncate">${item.name}</h3>
                                <p class="text-[10px] text-gray-400 mt-1 line-clamp-2 leading-tight">${item.desc}</p>
                                <p class="text-md font-black text-amber-500 mt-2">Rp ${item.price.toLocaleString()}</p>
                            </div>
                            <div class="mt-auto space-y-2">
                                <div class="flex bg-black rounded-lg border border-white/10 p-1 items-center justify-between">
                                    <button onclick="adj(${item.id},-1)" class="w-8 h-8 font-bold text-md">-</button>
                                    <input id="q-${item.id}" value="1" readonly class="w-8 bg-transparent text-center font-bold text-md text-white">
                                    <button onclick="adj(${item.id},1)" class="w-8 h-8 font-bold text-md">+</button>
                                </div>
                                <input id="n-${item.id}" placeholder="Note..." class="w-full bg-black border border-white/10 rounded-lg px-2 py-2 text-[10px] outline-none text-white">
                                <button onclick="add(${item.id},'${cat}')" class="w-full py-3 bg-white/5 hover:bg-amber-500 hover:text-black rounded-lg text-xs font-black uppercase transition">Add</button>
                            </div>
                        </div>
                    </div>
                `).join('');
            });
        }

        function adj(id, v) {
            let el = document.getElementById(`q-${id}`);
            let val = parseInt(el.value) + v;
            if (val >= 1) el.value = val;
        }

        function add(id, cat) {
            const item = menuData[cat].find(x => x.id === id);
            const q = parseInt(document.getElementById(`q-${id}`).value);
            const n = document.getElementById(`n-${id}`).value;
            cart.push({
                ...item,
                q,
                n
            });
            updCart();
        }

        function updCart() {
            const bar = document.getElementById('cart-bar');
            const bubbles = document.getElementById('cart-bubbles');
            if (cart.length > 0) bar.classList.add('active');
            else bar.classList.remove('active');

            bubbles.innerHTML = cart.map((item, i) => `
                <div class="shrink-0 bg-white/10 px-3 py-2 rounded-lg flex items-center gap-2 text-[10px] font-bold">
                    ${item.name} x${item.q}
                    <button onclick="rem(${i})" class="text-red-500"><i class="fas fa-times"></i></button>
                </div>
            `).join('');

            let total = cart.reduce((a, b) => a + (b.price * b.q), 0);
            document.getElementById('total-val').innerText = `Rp ${total.toLocaleString()}`;
        }

        function rem(i) {
            cart.splice(i, 1);
            updCart();
        }

        function openCheckout() {
            document.getElementById('checkout-modal').classList.remove('hidden');
            document.getElementById('checkout-list').innerHTML = cart.map(i => `
                <div class="flex justify-between border-b border-white/5 pb-2">
                    <div><p class="font-bold text-md">${i.name} x${i.q}</p><p class="text-xs text-gray-500">${i.n || '-'}</p></div>
                    <p class="font-bold text-md">Rp ${(i.price * i.q).toLocaleString()}</p>
                </div>
            `).join('');
        }

        function selectPay(method, el) {
            selectedMethod = method;
            document.querySelectorAll('.pay-card').forEach(c => c.classList.remove('selected', 'border-amber-500'));
            el.classList.add('selected', 'border-amber-500');
        }

        function closeCheckout() {
            document.getElementById('checkout-modal').classList.add('hidden');
        }

        function confirmOrder() {
            const table = document.getElementById('table-number').value;
            if (!table || !selectedMethod) return alert("Table number and payment method required.");
            const total = cart.reduce((a, b) => a + (b.price * b.q), 0);
            document.getElementById('r-table').innerText = table;
            document.getElementById('r-time').innerText = new Date().toLocaleString();
            document.getElementById('r-method').innerText = selectedMethod;
            document.getElementById('r-total').innerText = `Rp ${total.toLocaleString()}`;
            document.getElementById('r-items').innerHTML = cart.map(i =>
                `<div class="flex justify-between"><span>${i.name} x${i.q}</span><span>Rp ${(i.price * i.q).toLocaleString()}</span></div>`
                ).join('');
            if (selectedMethod === 'Bank Transfer') document.getElementById('bank-details').classList.remove('hidden');
            else document.getElementById('bank-details').classList.add('hidden');
            document.getElementById('checkout-modal').classList.add('hidden');
            document.getElementById('receipt-screen').classList.remove('hidden');
        }

        function downloadReceipt() {
            html2canvas(document.getElementById('receipt-capture')).then(canvas => {
                const link = document.createElement('a');
                link.download = 'Receipt.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        }

        // Search Functionality
        document.getElementById('menu-search').addEventListener('input', function(e) {
            const query = e.target.value.trim().toLowerCase();
            if (query === '') {
                document.querySelectorAll('.menu-card').forEach(card => card.classList.remove('search-highlight'));
                return;
            }

            let found = false;
            document.querySelectorAll('.menu-card').forEach(card => {
                const name = card.dataset.name;
                if (name.includes(query)) {
                    card.classList.add('search-highlight');
                    if (!found) {
                        card.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        found = true;
                    }
                } else {
                    card.classList.remove('search-highlight');
                }
            });
        });

        window.onload = () => {
            render();
            updCart();
        };
    </script>
</body>

</html>
