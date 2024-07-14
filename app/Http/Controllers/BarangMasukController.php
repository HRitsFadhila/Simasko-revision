<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DaftarBarang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::with('daftarBarang')->latest()->get();
        return view('barangmasuk.index', compact('barangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarBarang = DaftarBarang::all();
        return view('barangmasuk.tambah', compact('daftarBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_daftar_barang' => 'required|exists:daftarbarang,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        BarangMasuk::create($request->all());

        return redirect()->route('bmasuk.index')->with('success', 'Barang masuk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $barangMasuk = BarangMasuk::findOrFail($id);
        // $daftarBarang = DaftarBarang::all();
        // return view('barangmasuk.edit', compact('barangMasuk', 'daftarBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'id_daftar_barang' => 'required',
        //     'tanggal' => 'required|date',
        //     'jumlah' => 'required|integer'
        // ]);

        // $barangMasuk = BarangMasuk::findOrFail($id);
        // $barangMasuk->update($request->all());

        // return redirect()->route('bmasuk.index')->with('success', 'Barang masuk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->delete();

        return redirect()->route('bmasuk.index')->with('success', 'Barang masuk berhasil dihapus');
    }
}
