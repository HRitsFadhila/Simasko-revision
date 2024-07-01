<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::latest()->get();
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nama.required' => 'Nama harus diisi.',
            'nama.unique' => 'Nama supplier sudah ada.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'no_telp.required' => 'Nomor Handphone harus diisi.',
            'no_telp.string' => 'Nomor Handphone harus berupa string.',
            'no_telp.max' => 'Nomor Handphone tidak boleh lebih dari 15 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
        ];

        $request->validate([
            'nama' => 'required|unique:supplier,nama|string|max:255',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ], $messages);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
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
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validasi
    $request->validate([
        'nama' => 'required|string|max:255|unique:supplier,nama,'.$id,
        'no_telp' => 'required|string|max:15',
        'alamat' => 'required|string',
    ], [
        'nama.required' => 'Kolom nama harus diisi.',
        'nama.unique' => 'Nama supplier sudah ada.',
        'nama.max' => 'Nama supplier maksimal 255 karakter.',
        'no_telp.required' => 'Nomor Handphone harus diisi.',
        'no_telp.string' => 'Nomor Handphone harus berupa string.',
        'no_telp.max' => 'Nomor Handphone maksimal 15 karakter.',
        'alamat.required' => 'Kolom alamat harus diisi.',
        'alamat.string' => 'Alamat harus berupa string.',
    ]);

    // Sanitasi nama dan alamat untuk mencegah XSS
    $namaSupplier = htmlspecialchars($request->input('nama'), ENT_QUOTES, 'UTF-8');
    $alamatSupplier = htmlspecialchars($request->input('alamat'), ENT_QUOTES, 'UTF-8');

    // Dapatkan supplier berdasarkan ID
    $supplier = Supplier::findOrFail($id);

    // Update supplier
    $supplier->update([
        'nama' => $namaSupplier,
        'no_telp' => $request->input('no_telp'),
        'alamat' => $alamatSupplier,
    ]);

    return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Data berhasil dihapus!');
    }
}
