<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function reserve(Request $request)
    {
        // Logic reserve (simpan ke DB atau email). Untuk demo: redirect dengan success.
        return redirect()->route('home')->with('success', 'Reservation submitted!');
    }

    public function purchase(Request $request)
    {
        // Logic purchase (integrasi payment gateway nanti). Untuk demo: clear cart via session.
        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Purchase completed!');
    }
}
