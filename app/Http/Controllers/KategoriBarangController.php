<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriBarang = KategoriBarang::latest()->get();
        return view('kategori.barangindex', compact('kategoriBarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.tambahbarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required|string|max:20|unique:kategoribarang,nama_kategori',
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'nama.unique' => 'Nama kategori sudah ada.',
            'nama.max' => 'Nama kategori maksimal 20 karakter.',
        ]);

        // Sanitasi nama kategori untuk mencegah XSS
        $namaKategori = htmlspecialchars($request->input('nama'), ENT_QUOTES, 'UTF-8');

        // Buat kategori baru
        KategoriBarang::create([
            'nama_kategori' => $namaKategori
        ]);

        return redirect()->route('kbarang.index')->with('success', 'Kategori barang berhasil ditambahkan.');
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
        $kategoriBarang = KategoriBarang::findOrFail($id);
        return view('kategori.editbarang', compact('kategoriBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi
        $request->validate([
            'nama' => 'required|string|max:20|unique:kategoribarang,nama_kategori,'.$id,
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'nama.unique' => 'Nama kategori sudah ada.',
            'nama.max' => 'Nama kategori maksimal 20 karakter.',
        ]);

        // Sanitasi nama kategori untuk mencegah XSS
        $namaKategori = htmlspecialchars($request->input('nama'), ENT_QUOTES, 'UTF-8');

        // Dapatkan kategoriServis berdasarkan ID
        $kategoriBarang = KategoriBarang::findOrFail($id);

        // Update kategoriServis
        $kategoriBarang->update([
            'nama_kategori' => $namaKategori
        ]);

        return redirect()->route('kservis.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoriBarang = KategoriBarang::findOrFail($id);
        $kategoriBarang->delete();
        return redirect()->route('kbarang.index')->with('success', 'Data berhasil dihapus!');
    }
}
