<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\DaftarBarang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::with('daftarBarang')->get();
        return view('barangkeluar.index', compact('barangKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarBarang = DaftarBarang::all();
        return view('barangkeluar.tambah', compact('daftarBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_daftar_barang' => 'required',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer'
        ]);

        BarangKeluar::create($request->all());

        return redirect()->route('bkeluar.index')->with('success', 'Barang keluar berhasil ditambahkan');
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
        // $barangKeluar = BarangKeluar::findOrFail($id);
        // $daftarBarang = DaftarBarang::all();
        // return view('barangkeluar.edit', compact('barangKeluar', 'daftarBarang'));
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

        // $barangKeluar = BarangKeluar::findOrFail($id);
        // $barangKeluar->update($request->all());

        // return redirect()->route('bkeluar.index')->with('success', 'Barang keluar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->delete();

        return redirect()->route('bkeluar.index')->with('success', 'Barang keluar berhasil dihapus');
    }
}
