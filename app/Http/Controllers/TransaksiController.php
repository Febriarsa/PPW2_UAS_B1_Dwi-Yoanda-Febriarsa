<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Mengambil data transaksi dari database dan mengurutkannya berdasarkan tanggal pembelian secara descending
        $transaksi = Transaksi::orderBy('tanggal_pembelian', 'DESC')->get();

        // Mengirim data transaksi ke view 'transaksi.index'
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'total_harga' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        // Menyimpan data transaksi ke database
        Transaksi::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'total_harga' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        // Mengupdate data transaksi di database
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menghapus data transaksi dari database
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}