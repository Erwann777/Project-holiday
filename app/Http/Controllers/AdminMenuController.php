<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    // Fungsi untuk menampilkan halaman kasir
    public function index()
    {
        $menus = Menu::all(); // Mengambil semua data dari tabel menus
        return view('admin.index', compact('menus'));
    }

    // Fungsi untuk menyimpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'img' => 'required',
            'desc' => 'required',
        ]);

        Menu::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'img' => $request->img,
            'desc' => $request->desc,
            'is_available' => true,
        ]);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan!');
    }

    // Fungsi untuk ganti status stok
    public function toggleStatus($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->is_available = !$menu->is_available;
        $menu->save();

        return redirect()->back();
    }
}
