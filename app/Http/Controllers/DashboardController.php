<?php

namespace App\Http\Controllers;

use App\Models\Transaksi; // Import the model if you're fetching data from the database

class DashboardController extends Controller
{
    public function index()
    {
        $transaksi_count = Transaksi::count();

        $item_count = 0;
        $omzet = 0; 

        return view('dashboard', compact('transaksi_count', 'item_count', 'omzet'));
    }
}