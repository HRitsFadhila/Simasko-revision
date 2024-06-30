<?php

namespace App\Http\Controllers;

use App\Models\KategoriServis;
use Illuminate\Http\Request;

class KategoriServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriServis = KategoriServis::latest()->get();
        return view('kategori.servisindex', compact('kategoriServis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.tambahservis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi
        $request->validate([
            'nama' => 'required|string|max:20|unique:kategoriservis,nama_kategori',
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'nama.unique' => 'Nama kategori sudah ada.',
            'nama.max' => 'Nama kategori maksimal 20 karakter.',
        ]);

        // Sanitasi nama kategori untuk mencegah XSS
        $namaKategori = htmlspecialchars($request->input('nama'), ENT_QUOTES, 'UTF-8');

        // Buat kategori baru
        KategoriServis::create([
            'nama_kategori' => $namaKategori
        ]);

        return redirect()->route('kservis.index')->with('success', 'Kategori servis berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoriServis = KategoriServis::findOrFail($id);
        return view('kategori.editservis', compact('kategoriServis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validasi
        $request->validate([
            'nama' => 'required|string|max:20|unique:kategoriservis,nama_kategori,'.$id,
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'nama.unique' => 'Nama kategori sudah ada.',
            'nama.max' => 'Nama kategori maksimal 20 karakter.',
        ]);

        // Sanitasi nama kategori untuk mencegah XSS
        $namaKategori = htmlspecialchars($request->input('nama'), ENT_QUOTES, 'UTF-8');

        // Dapatkan kategoriServis berdasarkan ID
        $kategoriServis = KategoriServis::findOrFail($id);

        // Update kategoriServis
        $kategoriServis->update([
            'nama_kategori' => $namaKategori
        ]);

        return redirect()->route('kservis.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoriServis = KategoriServis::findOrFail($id);
        $kategoriServis->delete();
        return redirect()->route('kservis.index')->with('success', 'Data berhasil dihapus!');
    }
}
