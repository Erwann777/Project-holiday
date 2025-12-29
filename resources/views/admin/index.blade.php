<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Mario | Control Panel Kasir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0f0f0f; color: #fff; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .input-dark { background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; }
        .input-dark:focus { border-color: #f59e0b; outline: none; }
    </style>
</head>
<body class="p-4 md:p-10">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-amber-500 tracking-tight">D'MARIO CONTROL PANEL</h1>
                <p class="text-gray-400 text-sm">Kelola menu dan ketersediaan stok cafe Anda</p>
            </div>
            <a href="{{ route('halaman.menu') }}" target="_blank" class="bg-white/10 hover:bg-white/20 text-white px-5 py-2 rounded-full text-xs font-bold transition">
                <i class="fas fa-external-link-alt mr-2"></i> Lihat Web Customer
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-500 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1">
                <div class="glass p-6 rounded-2xl sticky top-10">
                    <h2 class="text-xl font-bold mb-6 flex items-center">
                        <i class="fas fa-plus-circle text-amber-500 mr-2"></i> Tambah Menu
                    </h2>

                    <form action="{{ route('admin.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="text-xs uppercase font-bold text-gray-500">Nama Menu</label>
                            <input type="text" name="name" class="w-full p-3 rounded-xl input-dark mt-1" placeholder="Contoh: Wagyu Steak" required>
                        </div>

                        <div>
                            <label class="text-xs uppercase font-bold text-gray-500">Kategori</label>
                            <select name="category" class="w-full p-3 rounded-xl input-dark mt-1">
                                <option value="food">Food</option>
                                <option value="drink">Drink</option>
                                <option value="dessert">Dessert</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-xs uppercase font-bold text-gray-500">Harga (Rp)</label>
                            <input type="number" name="price" class="w-full p-3 rounded-xl input-dark mt-1" placeholder="Contoh: 50000" required>
                        </div>

                        <div>
                            <label class="text-xs uppercase font-bold text-gray-500">Link URL Gambar</label>
                            <input type="text" name="img" class="w-full p-3 rounded-xl input-dark mt-1" placeholder="https://unsplash.com/..." required>
                        </div>

                        <div>
                            <label class="text-xs uppercase font-bold text-gray-500">Deskripsi Singkat</label>
                            <textarea name="desc" rows="3" class="w-full p-3 rounded-xl input-dark mt-1" placeholder="Penjelasan menu..." required></textarea>
                        </div>

                        <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-black font-black py-4 rounded-xl uppercase tracking-widest transition shadow-lg shadow-amber-500/20">
                            Simpan Menu
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="glass rounded-2xl overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/10">
                                <th class="p-4 text-xs font-bold uppercase text-gray-400 tracking-wider">Menu</th>
                                <th class="p-4 text-xs font-bold uppercase text-gray-400 tracking-wider">Kategori</th>
                                <th class="p-4 text-xs font-bold uppercase text-gray-400 tracking-wider text-center">Status Stok</th>
                                <th class="p-4 text-xs font-bold uppercase text-gray-400 tracking-wider text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach($menus as $m)
                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $m->img }}" class="w-12 h-12 rounded-lg object-cover border border-white/10">
                                        <div>
                                            <p class="font-bold text-sm">{{ $m->name }}</p>
                                            <p class="text-amber-500 text-xs font-bold">Rp {{ number_format($m->price) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-xs uppercase font-medium text-gray-400">{{ $m->category }}</td>
                                <td class="p-4 text-center">
                                    @if($m->is_available)
                                        <span class="bg-green-500/10 text-green-500 px-3 py-1 rounded-full text-[10px] font-bold border border-green-500/20">TERSEDIA</span>
                                    @else
                                        <span class="bg-red-500/10 text-red-500 px-3 py-1 rounded-full text-[10px] font-bold border border-red-500/20">SOLD OUT</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <form action="{{ route('admin.toggle', $m->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg text-[10px] font-bold transition">
                                            UBAH STATUS
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($menus->isEmpty())
                            <tr>
                                <td colspan="4" class="p-10 text-center text-gray-500 italic">Belum ada menu. Silakan tambah menu baru.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
