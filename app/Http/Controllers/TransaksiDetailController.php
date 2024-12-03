<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    public function index()
    {
        $transaksiDetails = TransaksiDetail::all();
        return view('transaksidetail.index', compact('transaksiDetails'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('transaksidetail')->findOrFail($id);
        return view('transaksidetail.detail', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksidetail = TransaksiDetail::findOrFail($id);
        return view('transaksidetail.edit', compact('transaksidetail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        $transaksidetail = TransaksiDetail::findOrFail($id);
        $transaksidetail->update($request->all());

        return redirect()->route('transaksidetail.index')->with('success', 'Transaksi detail berhasil diperbarui');
    }

    public function destroy($id)
    {
        $transaksidetail = TransaksiDetail::findOrFail($id);
        $transaksidetail->delete();

        return redirect()->route('transaksidetail.index')->with('success', 'Transaksi detail berhasil dihapus');
    }
}